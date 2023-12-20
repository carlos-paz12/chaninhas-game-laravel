<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
        return view('game');
    }

    public function all()
    {
        $games =
            Game::orderBy('hits', 'desc')
                ->orderBy('misses', 'asc')
                ->orderBy('end_game_datetime', 'asc')
                ->get();

        return view('ranking', ['games' => $games]);
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $gameData = $request->all();
        $gameData['user_id'] = $userId;
        $gameData['end_game_datetime'] = date('Y-m-d H:i:s');

        Game::create($gameData);

        return redirect()->route('game.ranking');
    }

}
