@extends('layouts.app')
@section('title', "$article->title")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $article->title }}</h1>
            <img src="{{ $article->image }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            <h3>{{ $article->description }}</h3>
            <a href="javascript:history.back()"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </div>
</div>
@endsection