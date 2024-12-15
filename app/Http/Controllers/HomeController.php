<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
use App\Models\Municipality;
use App\Notifications\NotifyCollector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'latitude' => 'required',
                'longitude' => 'required',
                'user_name' => 'required|string|min:3|max:20',
                'user_phone' => 'required|numeric|digits:10',
                'user_address' => 'required|string|min:3|max:255',
            ],
            [
                'An image is required' => 'image.required',
                'The file must be an image' => 'image.image',
                'The image must be a file of type: jpeg, png, jpg, gif, svg' => 'image.mimes',
                'The image must not exceed 2 MB' => 'image.max',
                'Latitude is required' => 'latitude.required',
                'Longitude is required' => 'longitude.required',
                'Username can not be empty' => 'user_name.required',
                'Username must be at least 3 characters' => 'user_name.min',
                'Username must be less than 20 characters' => 'user_name.max',
                'Phone number cannot be empty' => 'user_phone.required',
                'Phone number must be numeric' => 'user_phone.numeric',
                'Phone number must be exactly 10 digits' => 'user_phone.digits',
                'Address is required' => 'user_address.required',
                'Address must be at least 3 characters' => 'user_address.min',
            ]
        );

        $data = $request->all();
        $garbage = Garbage::create($data);
        $user = [
            'name' => $data['user_name'],
            'phone' => $data['user_phone'],
            'address' => $data['user_address'],
            'remarks' => $data['remarks'] ?? null,
        ];

//        if ($request->hasfile('image')) {

            $media=$garbage
                ->addMediaFromRequest('image')
                ->toMediaCollection('image');
            $image = $media->getUrl();

//        }

        $this->handleLocation($data['latitude'], $data['longitude'], $user,$image);
        return redirect()->back()->with('success', 'Your request has been submitted.');

    }

    public function getMap()
    {
        $garbages = Garbage::with('media') // Load media relation
            ->get()
            ->map(function ($garbage) {
                return [
                    'latitude' => $garbage->latitude,
                    'longitude' => $garbage->longitude,
                    'image' => $garbage->getFirstMediaUrl('image') ?? null, // Fetch the image URL
                ];
            });


        return view('map', compact('garbages'));

    }


    public function handleLocation($latitude, $longitude, array $user,$image)
    {

        // Find the nearest municipality
        $nearestMunicipality = $this->findNearestMunicipality($latitude, $longitude);

        if ($nearestMunicipality) {
            $email = $nearestMunicipality->email;
            $this->notifyMunicipality($email, $latitude, $longitude, $user,$image);
            return response()->json(['message' => "Notification sent to {$nearestMunicipality->name} Municipality"]);
        } else {
            return response()->json(['message' => 'No nearby municipality found']);
        }
    }

    private function findNearestMunicipality($latitude, $longitude)
    {
        // Query municipalities and calculate distance
        $municipalities = Municipality::all();

        $nearest = null;
        $minDistance = PHP_INT_MAX;

        foreach ($municipalities as $municipality) {
            $distance = $this->haversine($latitude, $longitude, $municipality->latitude, $municipality->longitude);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $nearest = $municipality;
            }
        }

        return $nearest;
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth radius in km

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    private function notifyMunicipality($email, $latitude, $longitude, $user,$image)
    {
        \Mail::to($email)->send(new \App\Mail\MunicipalityNotification($latitude, $longitude, $user,$image));
    }
}




