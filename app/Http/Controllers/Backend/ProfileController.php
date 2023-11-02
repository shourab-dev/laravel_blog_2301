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



      //* DATA UPDATE

        if ($request->hasFile('profile_img')) {
            $ext = $request->profile_img->extension();
            $imgName = auth()->user()->name . '-' . Carbon::now()->format('d-m-y-h-m-s') . '.' . $ext;
            $request->profile_img->storeAs('users', $imgName, 'public');
        }


        //*  user data update db
        $user = User::find(auth()->user()->id);
        $user->name = $request->userName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('profile_img')) {
            $user->profile_url = $imgName;
        }

        $user->save();
        return back();



    }
}
