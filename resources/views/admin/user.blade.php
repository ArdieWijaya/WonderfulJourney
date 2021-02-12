@extends('layouts.app')
@section('title', 'Users List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Users List</h1>
            @if($users->isEmpty())
                <h3 class="text-center">Nobody has registered yet.</h3>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td scope="row"><a href='/user/{{ $user->id }}/posts'>{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><a href="/user/{{ $user->id }}/delete"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection