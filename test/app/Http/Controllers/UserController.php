<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        $users = User::all();
        try {
            $users = User::all();
            return view('home', compact('users'));
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }


    }

    public function edit()
    {
        try {
            $myId = Auth::user()->id;
            $user = User::findOrFail($myId);
            return view('edit', compact('user'));
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $name = $this->validate($request, [
                'name' => 'string|max:255|nullable|unique:users,name,' . $user->id,
                'username' => 'string|regex:/^[a-z]+$/i|max:255|unique:users,name,' . $user->id,
            ]);

            $user->fill($request->all());
            $user->save();
            return redirect()
                ->route('index');
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }

    public function destroy($id)
    {
//        print_r($id);
//        exit();
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }
            return redirect()->route('index');
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $header = $request->header()['user-id'];
            if ($header) {
                $user = User::findOrFail($id);
                return view('show', compact('user'));
            }
        } catch (\Exception $e) {
            throw new GeneralJsonException('INTERNAL_ERROR');
        }
    }
}
