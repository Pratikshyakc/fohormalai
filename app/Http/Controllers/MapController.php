<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $garbages = Garbage::all();
        return view('map', compact('garbages'));
    }
}

Route::get('/map',[MapController::class,'index']);
