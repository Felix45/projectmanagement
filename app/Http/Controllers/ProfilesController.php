<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(User $user){
    
        return view('profile',compact('user'));
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
       
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'description' => 'required',
            'quote' => 'required',
            'image' => 'required'
        ]);

        $imagePath = request('image')->store('uploads','public');
        $data['image'] = $imagePath;

        auth()->user()->profile->update($data);

        return redirect('/profile/'.auth()->user()->id);
    }
}
