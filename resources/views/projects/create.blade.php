@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
       <form action="/project" method="post" enctype="multipart/form-data"> 
       @csrf
       <h1>{{ __('Create Project') }}</h1>
        <div class="form-group row">
            <div>
                <label for="title" class="col-md-12 col-form-label text-md-right"><strong>{{ __('Project Title') }}</strong></label>
            </div>

            <div class="col-md-12">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                @if($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div>
                <label for="description" class="col-md-12 col-form-label text-md-right"><strong>{{ __('Project Description') }}</strong></label>
            </div>

            <div class="col-md-12">
                <textarea id="description" rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus></textarea>

                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row mb-0 mt-3">
                <div class="col-md-12 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create Project') }}
                    </button>
                </div>
            </div>
            </form>
          </div>
      </div>
    </div>        
</div>
@endsection
