@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
       <form action="{{route('profile',$user->id)}}" method="post" enctype="multipart/form-data"> 
       @csrf
       @method('PATCH')
       
       <h1>{{ __('Edit Profile') }}</h1>
       <div class="form-group row">
            <div>
                <label for="image" class="col-md-12 col-form-label text-md-right"><strong>{{ __('Profile Photo') }}</strong></label>
            </div>

            <div class="col-md-12">
                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" autofocus>

                @if($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div>
                <label for="quote" class="col-md-12 col-form-label text-md-right"><strong>{{ __('About') }}</strong></label>
            </div>

            <div class="col-md-12">
                <input id="quote" type="text" class="form-control{{ $errors->has('quote') ? ' is-invalid' : '' }}" name="quote" value="{{ old('quote') ?? $user->profile->quote }}" required autofocus>

                @if($errors->has('quote'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('quote') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div>
                <label for="description" class="col-md-12 col-form-label text-md-right"><strong>{{ __('About') }}</strong></label>
            </div>

            <div class="col-md-12">
                <textarea id="description" rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ old('description') ?? $user->profile->description }}
                </textarea>

                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
           
            <div class="form-group row mb-0 mt-3">
                <div class="col-md-12 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
            </form>
          </div>
      </div>
    </div>      
</div>
@endsection
