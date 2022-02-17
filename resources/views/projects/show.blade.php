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
            <div><strong>3</strong> {{ __('Tasks') }}</div>
            <div class="ml-2"><strong>3</strong> {{ __('People') }}</div>
           </div>

           <ul class="nav nav-tabs mt-4">
                <li class="active">
                    <a data-toggle="tab" href="#projects" class="mr-3">{{ __('Project Tasks') }} <span class="badge badge-primary">{{ __('2') }}
                    </span></a>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection
