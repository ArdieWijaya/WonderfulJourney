@extends('layouts.app')
@section('title', 'Create Blog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>New Blog</h1>
            <form method="POST" action="{{ route('userblogcreatepost') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title:') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        </div>

        <div class="form-group row">
            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category:') }}</label>

            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control @error('role') is-invalid @enderror" name="category" required autofocus id="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo:') }}</label>

            <div class="col-md-6">
                <input type="file" class="form-control-file" id="image" name="image">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Story: ') }}</label>

            <div class="col-md-6">
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10"></textarea>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection