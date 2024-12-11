<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'location' => 'required',
                'user_name' => 'required',
                'user_phone' => 'required',
                'user_address' => 'required',
                'remarks' => 'required'
            ]
        );

    }
}




