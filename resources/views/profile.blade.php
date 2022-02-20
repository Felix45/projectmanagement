@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
          <img src="/images/logo.png" class="w-150 rounded-circle"/>
        </div>
        <div class="col-md-9">
           <div class="d-flex justify-content-between align-items-baseline">
               <h1>{{ $user->name }}</h1>
               @can('update',$user->profile)
                <a href="{{ route('create_project')}}" class="btn btn-sm btn-primary font-weight-bold">Create New Project</a>
                @endcan
           </div>
            @can('update',$user->profile)
            <div>
                <a href="{{ route('profiles.edit',$user->id)}}/" class="font-weight-bold">{{ __('Edit profile') }}</a>
            </div>
            @endcan
           
           <div class="d-flex">
               <div class="pr-5"><strong>{{ $user->projects->count() }}</strong> Project(s)</div>
               <div class="pr-5"><strong>{{ $user->assignedTasks->count() }}</strong> Assigned tasks</div>
               <div class="pr-5"><strong>Pending tasks</strong> 3</div>
           </div>
           <div>
               <div><strong>{{__('Responsibility')}}</strong></div>
               <div>{{ $user->roles()->first()->name }}</div>
               <div class="pt-3 pb-3 text-justify">{{$user->profile->description}}</div>
               <div class="pt-3 pb-1 text-justify">
                   <blockquote class="blockquote">{{$user->profile->quote}}</blockquote>
                </div>
               <div><a href="mailto:{{$user->email}}">Email: {{$user->email}}</a></div>
           </div>
        </div>    
    </div>
    <div class="row">
       <div class="col-md-12 pt-3">
           <h2>{{ __('Assignments') }}</h2>
           <ul class="nav nav-tabs mb-4">
                <li class="active">
                    <a data-toggle="tab" href="#projects" class="mr-3">My Projects <span class="badge badge-primary">{{ $user->projects->count() }}
                    </span></a>
                </li>
            
                <li>
                    <a data-toggle="tab" href="#tasks">Tasks <span class="badge badge-primary">{{ $user->assignedTasks->count() }}
                    </span></a>
                </li>
            </ul>

           <div class="tab-content">
              <div id="projects" class="tab-pane active">
                @foreach($user->projects as $project)
                    <div class="mb-4" style="display:inline-block;width:33%;">
                        <h6><a href="{{ route('show_project',$project->id) }}"><strong>{{ $project->title }}</strong></a></h6>
                        <div>{{__('Date: ') }} {{ $project->created_at }}</div>
                        <div class="pull-left align-items-baseline">
                            {{ __('Project Owner ') }} <a href="" class="pr-2 pl-1"> {{ $project->user->name }}</a>
                            @can('update',$project)
                                <a href="" class="btn btn-sm btn-primary font-weight-bold">{{__('Add Task(s)')}} </a>
                            @endcan
                        </div>
                    </div>
                @endforeach
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
