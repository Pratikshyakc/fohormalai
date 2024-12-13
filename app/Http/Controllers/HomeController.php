<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'latitude' => 'required',
                'longitude' => 'required',
                'user_name' => 'required|string|min:3|max:20',
                'user_phone' => 'required|numeric|digits:10',
                'user_address' => 'required|string|min:3|max:255',
            ],
            [
                'image.required' => 'An image is required',
                'image.image' => 'The file must be an image',
                'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
                'image.max' => 'The image must not exceed 2 MB',
                'latitude.required' => 'Latitude is required',
                'longitude.required' => 'Longitude is required',
                'user_name.required' => 'Username can not be empty',
                'user_name.min' => 'Username must be at least 3 characters',
                'user_name.max' => 'Username must be less than 20 characters',
                'user_phone.required' => 'Phone number cannot be empty',
                'user_phone.numeric' => 'Phone number must be numeric',
                'user_phone.digits' => 'Phone number must be exactly 10 digits',
                'user_address.required' => 'Address is required',
                'user_address.min' => 'Address must be at least 3 characters',
            ]
        );
//    public function store(Request $request)
//    {
//
//        $request->validate(
//            [
//                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'latitude' => 'required',
//                'longitude' => 'required',
//                'user_name' => 'required|string|min:3|max:20',
//                'user_phone' => 'required|numeric|digits:10',
//                'user_address' => 'required|string|max:255',
//                ],
//                [
//                    'user_name.required' => 'Username can not be empty',
//                    'user_name.min' => 'Username must be at least 3 characters',
//                    'user_name.max' => 'Username must be less than 20 characters',
//                    'user_phone.required' => 'Phone number cannot be empty',
//                    'user_address.required' => 'Address is required',
//                ]);
//            ],
//            [
//             'user_name.required' =>'Username can not be empty'
////            'user_name.min'=> 'Username must be at least 3 characters',
////                'user_name.max' => 'Username must be less than 20 characters',
//                'user_phone.required' =>'Phone number can not be empty',
//                'user_address.required' =>'Address is required',
//            ]
//    );


        $data = $request->all();
        Garbage::create($data);
        Notification::route('mail', 'recipient@example.com')->notify(new NotifyCollector());

        if ($request->hasFile('image')) {
            //store image in image_url
        }

        return redirect()->back()->with('success', 'Your request has been submitted.');

    }

    public function getMap()
    {
        $garbages = Garbage::get(['latitude', 'longitude']);
        return view('map', compact('garbages'));
    }
}




