@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <a class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @section('content')
                            <a href="{{ route('movie.index') }}">
                            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">movie</button>
                    </a>
                    <table class="table ms-2">
                        <thead>
                        <tr>
                            <th scope="col">username</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if(Auth::user()->id!==$user->id)
                                    <td><a href="{{ route('home.show', $user->id) }}">
                                            {{$user->username}}
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->id!==$user->id)
                                    <td>
{{--                                        <a href="{{ route('home.destroy', $user->id) }}"--}}
{{--                                           onclick="document.getElementById('delete-form').submit();"--}}
{{--                                        >--}}
{{--                                            <button type="button" class="btn btn-danger">delete</button>--}}
{{--                                        </a>--}}
                                        <form id="delete-form" action="{{ route('home.destroy', $user->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger mb-3" value="DELETE">
                                        </form>
                                        {{--                                            </a>--}}
                                    </td>
                                @endif
                            </tr>
                    @endforeach
                    @endsection
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
