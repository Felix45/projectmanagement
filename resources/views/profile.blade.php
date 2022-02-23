@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
          @if($user->profile->image)
            <img src="{{ $user->profile->image }}" class="w-75 rounded-circle"/>
          @else
            <img src="/images/default.png" class="w-75 rounded-circle"/>
          @endif
        </div>
        <div class="col-md-9">
           <div class="d-flex justify-content-between align-items-baseline">
               <h1>{{ $user->name }}</h1>
               @can('update',$user->profile)
                <a href="{{ route('create_project')}}" class="btn btn-sm btn-primary font-weight-bold">{{ __('Create New Project') }}</a>
                @endcan
           </div>
            @can('update',$user->profile)
            <div>
                <a href="{{ route('profiles.edit',$user->id)}}/" class="font-weight-bold">{{ __('Edit profile') }}</a>
            </div>
            @endcan
            @php
               $data = [
                   'projects' => $user->projects->count(), 
                   'assigned' => $user->assignedTasks->count(),
                   'pending'  => $user->assignedTasks->count(),
                   'responsibility' => $user->roles()->first()->name,
                   'description' => $user->profile->description,
                   'quote' => $user->profile->quote,
                   'email' => $user->email
               ];     
            @endphp
           <div id="rprofile" data-profile="{{ json_encode($data) }}"></div>
           
           <div>
               <div><a href="mailto:{{$user->email}}">Email: {{$user->email}}</a></div>
           </div>
        </div>    
    </div>
    <div class="row">
       <div class="col-md-12 pt-3">
           <h2>{{ __('Assignments') }}</h2>
           <ul class="nav nav-tabs mb-4">
                <li class="active">
                    <a data-toggle="tab" href="#rproject" class="mr-3">My Projects <span class="badge badge-primary">{{ $user->projects->count() }}
                    </span></a>
                </li>
            
                <li>
                    <a data-toggle="tab" href="#tasks">Tasks <span class="badge badge-primary">{{ $user->assignedTasks->count() }}
                    </span></a>
                </li>
            </ul>

           <div class="tab-content">
                @php $all_projects = [] @endphp
                @foreach($user->projects as $project)
                    @php
                        $project['user_name'] = $project->user->name;
                        $project['edit']  = auth()->check() ? auth()->user()->can('update',$project) : false;
                        $project['task_count'] = $project->tasks()->count();
                        $all_projects[] = $project; 
                    @endphp
                @endforeach
              <div id="rproject" class="tab-pane active" data-projects="{{ json_encode($all_projects) }}">
            
              </div>

              <div id="tasks" class="tab-pane fade">
                @php 
                    $count = 0;
                @endphp
                <table class="table table-striped table-responsive">
                    <tr>
                      <th>{{ __('#')}} </th>
                      <th>{{ __('Task')}}</th>
                      <th>{{ __('Project')}}</th>
                      <th>{{ __('Task Owner')}}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Visibility') }}</th>
                      <th>{{ __('Documents') }}</th>
                      <th>{{ __('Deadline') }}</th>
                    </tr>
                @foreach($user->assignedtasks as $task)
                @can('view',$task)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <a href="{{ route('show_project',$task->project->id) }}" title="{{ $task->project->title }}">{{__('Project')}} </a>
                        </td>
                        <td><a href="{{ route('profile',$task->user->id) }}">{{ $task->user->name }}</a></td>
                        <td>{{ $task->status === 0 ? "Open" : "Finished" }}</td>
                        <td>{{ $task->visibility === 1 ? "Public" : "Private" }}</td>
                        <td>
                            @foreach($task->documents as $document)
                                <a href="{{ '/uploads/'.$document->url }}" target="_blank">{{ __('Document') }}</a>
                            @endforeach
                        <td>{{ $task->due_date }}</td>
                    </tr>
                @endcan
                @endforeach
                </table>
              </div>
        </div>
       </div>
    </div>
</div>
@endsection
