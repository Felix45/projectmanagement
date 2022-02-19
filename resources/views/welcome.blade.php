
@extends('layouts.app')
@section('content')
    <div class="home">
        <div class="flex-center position-ref full-height">
        </div>
    </div>
    <div class="container">
            <div class="">
                <div class="content text-center">
                    <div class="title m-b-md">
                        {{ __('Project Tracker') }}
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary font-weight-bold" href="{{ route('login') }}">{{ $users->count() }} {{ __('User(s)') }}</a>
                    <a class="btn btn-primary font-weight-bold" href="{{ route('register') }}">{{ $projects->count() }} {{ __('Project(s)') }}</a>
                    
                </div>
            </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6">
                <h4 class="font-weight-bold">{{ __('Better organization of project tasks') }}</h4>
                <img src="/images/task.svg" class="background-image">
                <p class="text-justify">{{ __('Tracker\'s shared backlog makes priorities clear so the team can stay organized. Easily visualize scope, focus your teamwork, and stay nimble when circumstances change.') }}</p>
            </div>
            <div class="col-md-6">
                <h4 class="font-weight-bold">{{ __('Tools to help you adapt and evolve') }}</h4>
                <img src="/images/project.svg" class="background-image">
                <p class="text-justify">{{ __('Tracker\'s guided iteration planning helps you break down and prioritize projects into manageable chunks so the team can keep the momentum toward delivering.') }}</p>
            
            </div>
        </div>
    </div>
@endsection()
