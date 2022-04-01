@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <a href="{{ route('movie.index') }}">
            <button type="button" class="btn btn-primary mb-4 ms-5 center-block">Movie</button>
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
        <table class="table ms-2">
            <thead>
            <tr>
                <th scope="col">username</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td>
                        {{$film->title}}
                    </td>
                    <td>
                        <form action="{{ route('favorites.destroy', $film->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger mb-3" value="DELETE">
                        </form>
                    </td>
                </tr>
    @endforeach
            </tbody>
        </table>
{{--    {{$films->links('vendor.pagination.default')}}--}}
    </div>
@endsection
