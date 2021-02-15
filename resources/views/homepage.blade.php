@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex flex-wrap justify-content-between">
            @foreach($articles as $article)
            <div class="mt-3 mb-3 p-3" style="width: 33%;">
                <h2><a href="/article/{{ $article->id }}">{{ $article->title }}</a></h2>
                <h4>{{ $descriptions[$loop->index] }}<a href="/article/{{ $article->id }}"> full story</a></h4>
                <h5 style="font-style: italic;">Category :<a href="/category/{{ $article->category_id }}"> {{ $article->category->name }}</a></h5>
                <h5 style="font-style: italic;">Created by : {{ $article->user->name }}</h5>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
