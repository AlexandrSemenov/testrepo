<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests;

class GameController extends Controller
{
    /**
     * страница со всеми играми
     */
    public function index()
    {
        $games = Game::all();
        return view('game', ['games' => $games]);
    }

    /**
     * создаем новую запись
     */

    public function createGame(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:games',
            'description' => 'required'
        ],[
            'name.required' => 'Название игры должно быть заполнено',
            'name.unique' => 'Название игры должно быть уникальным',
            'description.required' => 'Описание игры должно быть заполнено'
        ]);


        $game = new Game();
        $game->name = $request['name'];
        $game->description = $request['description'];
        $game->save();

        return redirect()->route('game.index');
    }

    /**
     * обновляем запись
     */
    public function editGame($id)
    {
        $game = Game::find($id);
        return view('game-update', ['game' => $game]);
    }

    public function updateGame(Request $request, $id)
    {
        $game = Game::find($id);

        $game->name = $request['name'];
        $game->description = $request['description'];
        $game->update();

        return redirect()->route('game.index');
    }
}
