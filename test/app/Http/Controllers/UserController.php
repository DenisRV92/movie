<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $users = User::get();
//        return view('article_category.index', compact('articleCategories'));
        return view('home',compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'string|max:255|unique:users,name,'.$user->id,
//            'name' => ['string', 'max:255', 'nullable'],
            'username' => 'required|regex:/^[a-z]+$/i|string|max:255|unique:users',
        ]);

        $user->fill($request->all());
        $user->save();
        return redirect()
            ->route('index');
    }
    public function destroy($id)
    {
        // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('index');
    }
}
