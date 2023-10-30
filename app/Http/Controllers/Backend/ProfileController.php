<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function showProfile () {
        return view('backend.profile');
    }

    function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            "profile_img" => "nullable|mimes:jpg,png"

        ], [
            'name.required' => "Enter your user name" 
        ]);



        if ($request->hasFile('profile_img')) {
            echo "yes";
        } 



    }
}
