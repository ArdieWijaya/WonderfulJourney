@extends('layouts.app')
@section('title', 'Homepage')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome {{ $name }}</h1>
            </div>
        </div>
    </div>
@endsection
