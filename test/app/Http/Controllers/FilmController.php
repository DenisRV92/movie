<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Models\Film;
use App\Models\FilmUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $films = Film::paginate(15);
            return view('films.movie', compact('films'));
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }

    }

    public function add($id)
    {
        try {
//            print_r($id);
//            exit();
            $userId = Auth::user()->id;
            $user = Auth::user();
            $films = DB::table('film_users')
                ->where('user_id', '=', $userId)
                ->where('film_id', '=', $id)
                ->get();
//        print_r($films->count());
//        exit();
            if ($films->count() === 0) {
                $user->getFilms()->attach($id);
            }
            return back();
        }

//        FilmUser::truncate();

        catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }

    }

    public function showFavorites()
    {
        try {
            $user = Auth::user();
            $films = $user->getFilms()->paginate(15);
//        dd($user->getFilms);
            return view('films.favorites', compact('films'));

        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }

    public function showNoFavorites()
    {
        try {

            $films = DB::table('films')
//                ->leftJoin('film_users', 'films.id', 'film_users.film_id')
                ->leftJoin('film_users', function ($leftJoin) {
                    $myId = Auth::user()->id;
                    $leftJoin->on('films.id', '=', 'film_users.film_id')
                        ->where('film_users.user_id', '=', $myId);
                })
                ->whereNull('film_users.film_id')
                ->paginate(15);

            return view('films.noFavorites', compact('films'));
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }


    public function destroy($id)
    {
        try {
            $user = Auth::user();
            $user->getFilms()->detach($id);

            return back();
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }
}
