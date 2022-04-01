@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline" action="{{route('home.update', $user)}}" method="post">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value={{$user->name}}>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" value={{$user->username}}>
                </div>
            </div>
            @csrf
            @method('PATCH')
            <input type="submit" class="btn btn-primary" value="edit">
        </form>
    </div>
@endsection
