<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    //
    public function create(){
       
        $data = request()->validate([
            'description' => 'required|string',
            'project_id'  => 'required|integer',
            'visibility'  => '',
            'priority'    => ''
        ]);
        $data['user_id'] = auth()->user()->id;
        auth()->user()->tasks()->create($data);

        return redirect('/project/'.$data['project_id']);
    }
}
