@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
            <img src="/images/logo.png" class="w-150 rounded-circle mb-3"/>
            <div>
                {{ __('Project Owner: ')}}
                <a href="{{ route('profile',$project->user->id) }}">{{ $project->user->name }}</a>
            </div>
        </div>
        <div class="col-md-9">
            <h1>{{ $project->title }}</h1>
            <p>{{__('Date Posted: ') }} {{ $project->created_at }}
            <p>{{ $project->description }}</p>

           <div class="d-flex">
            <div><strong>{{ $project->tasks->count() }}</strong> {{ __('Task(s)') }}</div>
            <div class="ml-2"><strong>{{ $project->tasks->count() }}</strong> {{ __('People') }}</div>
           </div>

           <ul class="nav nav-tabs mt-4">
                <li class="active">
                    <a data-toggle="tab" href="#projects" class="mr-3">{{ __('Project Tasks') }} <span class="badge badge-primary">{{ $project->tasks->count() }}
                    </span></a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#tasks" class="mr-3">{{ __('Add Task') }} </a>
                </li>
            </ul>

            <div class="tab-content">
              <div id="projects" class="tab-pane active">
                <table class="table table-striped table-responsive table-condensed">
                    <tr>
                      <th>{{ __('Description') }}</th>
                      <th>{{ __('Priority') }}</th>
                      <th>{{ __('Task Status') }}</th>
                      <th>{{ __('Assigned to') }}</th>
                      <th>{{ __('Due date') }}</th>
                    </tr>
                @foreach($project->tasks as $task)
                  <tr>
                      <td>{{ $task->description }}</td>
                      <td>{{ $task->priority == 1 ? "High" : "Low" }}</td>
                      <td>{{ $task->status == 1 ? "Closed" : "Open" }}</td>
                      <td>
                          @foreach($task->assignees as $assignee)
                            <a href="{{ route('profile',$assignee->id) }}">{{ $assignee->name }}</a>,
                          @endforeach
                      </td>
                      <td>{{ $task->due_date }}</td>
                  </tr>
                @endforeach
                </table>
              </div>
              <div id="tasks" class="tab-pane fade">
              <div class="row">
        <div class="col-md-8">
        <h3 class="mt-3"> {{ __('Add Task')}} </h3>
        <form action="{{ route('tasks.create') }}" method="post" enctype="multipart/form-data"> 
       @csrf
        <div class="form-group row">
            <div>
                <label for="description" class="col-md-12 col-form-label text-md-right"><strong>{{ __('Describe Task') }}</strong></label>
            </div>

            <div class="col-md-12">
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div>
                <label for="due_date" class="col-md-12 col-form-label text-md-right"><strong>{{ __('Due Date') }}</strong></label>
            </div>

            <div class="col-md-12">
                <input id="due_date" type="date" class="form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" value="{{ old('duedate') }}" required autofocus>

                @if($errors->has('due_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('due_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input id="project_id" type="hidden" class="form-control{{ $errors->has('project_id') ? ' is-invalid' : '' }}" name="project_id" value="{{ $project->id }}" required autofocus>

        <div class="form-group row">
            
            <div class="col-md-12">
                <input id="visibility" type="checkbox"  name="visibility" value="1" autofocus> {{ __('Private') }}
                
                <div>
                    <label for="priority" class="col-md-12 col-form-label pl-0"><strong>{{ __('Task Priority') }}</strong></label>
                </div>

                <div id="priority">
                    <input id="priority" type="radio"  name="priority" value="0" required autofocus selected> {{ __('Low') }}
                    <input id="priority" type="radio"  name="priority" value="1" required autofocus> {{ __('High') }}
                </div>
                @if($errors->has('priority'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('priority') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-12">
               
                <div>
                    <label for="assignee" class="col-md-12 col-form-label pl-0"><strong>{{ __('Assign Task To') }}</strong></label>
                </div>

                <div>
                    @foreach($users as $user)
                        <input id="assignee" type="checkbox"  name="assignee[]" value="{{ $user->id }}" required autofocus> {{ $user->name }}
                    @endforeach
                </div>
                @if($errors->has('assignee'))
                    <span class="invalid-feedback" role="alert">
                        
                    </span>
                @endif
            </div>
           
            <div class="form-group row mb-0 mt-3">
                <div class="col-md-12 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Task') }}
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>  
              </div>
            
        </div>
    </div>
    
</div>
@endsection
