@extends('layouts.app')
@section('title', "Category: $category->name")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($articles as $article)
                <h1>{{ $article->title }}</h1>
                <h3>{{ $descriptions[$loop->index] }}<a href="/article/{{ $article->id }}">full story</a></h3>
            @endforeach
        </div>
    </div>
</div>
@endsection