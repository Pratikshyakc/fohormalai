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
                'latitude' => 'required|decimal',
                'longitude' => 'required|decimal',
                'user_name' => 'required|string:max:255',
                'user_phone' => 'required|numeric|digits:10',
                'user_address' => 'required|string:max:255',
                'remarks' => 'required|string:max:255',
            ]
        );


        $data = $request->all();
        Garbage::create($data);
        if ($request->hasFile('image')) {
            //store image in image_url
        }
        Notification::route('mail', 'recipient@example.com')->notify(new NotifyCollector());

        return redirect()->back()->with('success', 'Your request has been submitted.');

    }

    public function getMap()
    {
        $garbages = Garbage::get(['latitude', 'longitude']);
        return view('map', compact('garbages'));
    }
}




