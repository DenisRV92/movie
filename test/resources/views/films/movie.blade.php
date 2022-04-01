@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <a href="{{ route('favorites') }}">
            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">favorites</button>
        </a>
        <a href="{{ route('index') }}">
            <button type="button" class="btn btn-dark mb-4 ms-5 center-block">Home</button>
        </a>
        <a href="{{ route('noFavorites') }}">
            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">noFavorites</button>
        </a>
        <div>{{$films->links('vendor.pagination.default')}}</div>
    </div>
    <div>
        <table class="table ms-2 text-center">
            <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">poster</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td class="w-25">
                        {{$film->title}}
                    </td>
                    <td class="w-50">
                        <img src="https://image.tmdb.org/t/p/original/{{$film->poster_path}}" alt="profile Pic" height="200" width="200">
{{--                        {{$film->poster_path}}--}}
                    </td>
                    <td>
                        <a href="{{ route('movie.add', $film->id) }}">
                            <button type="button" class="btn btn-success">add</button>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

