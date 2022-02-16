<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ProjectsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('projects.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|required'
        ]);

        auth()->user()->projects()->create($data);

        return redirect('/profile/'.auth()->user()->id);
    }
}
