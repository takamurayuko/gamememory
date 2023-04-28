<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;

class GameController extends Controller
{
    //  public function create(Request $request)
    // {
    //     return view('user.create');
    // }
    
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Game::$rules);

        $games = new Game;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $games->image_path = basename($path);
        } else {
            $games->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $games->fill($form);
        $games->save();

        return view('user.create');
    }
}
    



