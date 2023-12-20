<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $allGames = Game::orderBy('hits', 'desc')
            ->orderBy('misses', 'asc')
            ->orderBy('end_game_datetime', 'asc')
            ->get();
        $position = 0;

        for ($i = 0; $i < count($allGames); $i++) {
            if ($allGames[$i]->user_id === $user->id) {
                $position = $i + 1;
                break;
            }
        }

        return view('profile', ['position' => $position]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()],
        ]);

        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        $user = User::create($user);

        Auth::login($user);

        return redirect()->route('game');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('game');

        } else {

            return back()->withErrors(['auth-failure' => 'Authentication failed. Please check your credentials.',]);

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('game');
    }

}
