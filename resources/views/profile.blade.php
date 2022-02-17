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
               <div class="pr-5"><strong>Completed tasks</strong> 120</div>
               <div class="pr-5"><strong>Pending tasks</strong> 3</div>
           </div>
           <div>
               <div><strong>Department</strong></div>
               <div>Information Communication Technology</div>
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
                    <a data-toggle="tab" href="#menu1">Tasks <span class="badge badge-primary">{{ $user->projects->count() }}
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

              <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
              </div>
        </div>
       </div>
      
            
        

    </div>
</div>
@endsection
