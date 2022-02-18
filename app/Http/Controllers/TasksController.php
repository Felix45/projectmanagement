<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;

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
        
        /*$data['user_id'] = auth()->user()->id;
        $assignees = $data['assignee'];

        unset($data['assignee']);
       
        $task = auth()->user()->tasks()->create($data);

        $users = User::find($assignees);
        
        $task->assignees()->attach($users);
        */

        $files = [];
        $documents = [];
        

        foreach(request()->file('documents') as $file){
            $name = time().'.'.$file->extension();
            $file->move(public_path().'/uploads/', $name);
            $files['url'] = $name;

            $document = Document::create($files);
            array_push($documents,[$document->id,$file->getClientOriginalName()]);

        }
        dd($documents);
        //$docs = Document::find($documents);
        //$task->documents()->attach($docs);

        return redirect('/project/'.$data['project_id']);
    }
}
