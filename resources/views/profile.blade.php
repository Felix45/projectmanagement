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
               <a href="{{ route('create_project')}}" class="btn btn-sm btn-primary font-weight-bold">Create New Project</a>
           </div>
           
           <div class="d-flex">
               <div class="pr-5"><strong>Assigned tasks</strong> 123</div>
               <div class="pr-5"><strong>Completed tasks</strong> 120</div>
               <div class="pr-5"><strong>Pending tasks</strong> 3</div>
           </div>
           <div>
               <div><strong>Department</strong></div>
               <div>Information Communication Technology</div>
               <div class="pt-3 pb-3 text-justify">{{$user->profile->description}}</div>
               <div class="pt-3 pb-3 text-justify">
                   <blockquote class="blockquote">{{$user->profile->quote}}</blockquote>
                </div>
               <div><a href="mailto:{{$user->email}}">Email: {{$user->email}}</a></div>
           </div>
        </div>    
    </div>
    <div class="row">
       <div class="col-md-12 pt-3">
           <h2>Assigned Tasks</h2>
           <hr/>
       </div>
       @foreach($user->projects as $project)
         <div class="col-md-4 mb-3">
            <h6><strong>{{ $project->title }}</strong></h6>
            <div class="pull-left">
                <a href="" class="btn btn-sm btn-primary font-weight-bold">{{__('Add Task(s)')}} </a>
            </div>
         </div>
       @endforeach

    </div>
</div>
@endsection
