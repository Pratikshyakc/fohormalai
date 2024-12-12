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
        Notification::route('mail', 'recipient@example.com')->notify(new NotifyCollector());

        $validated = $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'latitude' => 'required',
                'longitude' => 'required',
                'user_name' => 'required|string:max:255',
                'user_phone' => 'required|numeric|digits:10',
                'user_address' => 'required|string:max:255',
                'remarks' => 'required|string:max:255',
            ]
        );
        return true;

    }
}




