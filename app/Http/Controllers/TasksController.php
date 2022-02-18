<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TasksController extends Controller
{
    //
    public function create(){
       
        $data = request()->validate([
            'description' => 'required|string',
            'project_id'  => 'required|integer',
            'visibility'  => '',
            'priority'    => '',
            'due_date' => 'required|date|after_or_equal:today',
            'assignee' => 'required'
        ]);
        $data['user_id'] = auth()->user()->id;
        $assignees = $data['assignee'];

        unset($data['assignee']);
       
        $task = auth()->user()->tasks()->create($data);

        $users = User::find($assignees);
        
        $task->assignees()->attach($users);

        return redirect('/project/'.$data['project_id']);
    }
}
