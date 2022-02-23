<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        return redirect('/profile/'.auth()->user()->id);
    }

    public function home(){
        $users = User::all();
        $projects = Project::all();

        return view('welcome',compact('users','projects'));
    }
}
