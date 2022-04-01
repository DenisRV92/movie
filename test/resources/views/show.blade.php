@extends('layouts.app')

@section('content')
{{--    <div>--}}

{{--        <td>{{$user->id}}</td>--}}
{{--        <td>{{$user->email}}</td>--}}
{{--        <td>{{$user->username}}</td>--}}
{{--        <td>{{$user->name}}</td>--}}
{{--    </div>--}}
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">email</th>
        <th scope="col">username</th>
        <th scope="col">name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->email}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->name}}</td>
    </tr>
    </tbody>
</table>
@endsection
