@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--                    {{ __('You are logged in!') }}--}}

                        @section('content')
                            {{--                            {{__('You are logged in!') }}--}}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">username</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="">{{$user->username}}</a></td>
                                        <td><a href="{{ route('home.destroy', $user->id) }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                                <button type="button" class="btn btn-danger">delete</button>
                                            </a>
                                                <form id="delete-form" action="{{ route('home.destroy', $user->id) }}" method="DELETE">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
{{--                                            </a>--}}
                                        </td>
                                    </tr>
                            @endforeach
                        @endsection
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
