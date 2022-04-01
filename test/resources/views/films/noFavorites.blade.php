@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <a href="{{ route('favorites') }}">
            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">favorites</button>
        </a>
        <a href="{{ route('index') }}">
            <button type="button" class="btn btn-dark mb-4 ms-5 center-block">Home</button>
        </a>
        <a href="{{ route('movie.index') }}">
            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">Movie</button>
        </a>
        <div>{{$films->links('vendor.pagination.default')}}</div>
    </div>
    <div>
        <table class="table ms-2">
            <thead>
            <tr>
                <th scope="col">title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td>
                        {{$film->title}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$films->links('vendor.pagination.default')}}--}}
    </div>
@endsection
