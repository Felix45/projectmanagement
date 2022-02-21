<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

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

        $project = auth()->user()->projects()->create($data);

        return redirect('/project/'.$project->id);
    }

    public function show(Project $project){

        $users = User::all()->except(auth()->user()->id);
        return view('projects.show',[
            'project' => $project,
            'users' => $users
        ]);
    }

    
}
