<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = config('profile');

        return view('profile', compact('profile'));
    }
}
