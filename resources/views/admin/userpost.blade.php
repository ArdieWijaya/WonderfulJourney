@extends('layouts.app')
@section('title', 'Blog List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $user->name }}'s Blog List</h1>
            @if($blogs->isEmpty())
            <h3 class="text-center">{{ $user->name }} hasn't written any blogs yet.</h3>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td scope="row"><a href="/article/{{ $blog->id }}">{{ $blog->title }}</a></td>
                        <td><a href="/user/{{ $user->id }}/posts/{{ $blog->id }}/delete"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection