<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmUsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $films = $user->getFilms;
//        dd($user->getFilms);
        return view('films.favorites', compact('films'));
    }
}
