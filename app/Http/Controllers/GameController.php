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
    
     public function add()
    {
        return view('user.create');
    }
    
    public function create(Request $request)
    {
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

        return redirect('/create');
    }
    
     public function edit(Request $request)
    {
        // Game Modelからデータを取得する
        $game = Game::find($request->id);
        if (empty($game)) {
            abort(404);
        }
        return view('user.edit', ['game_form' => $game]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Game::$rules);
        // News Modelからデータを取得する
        $game = Game::find($request->id);
        // 送信されてきたフォームデータを格納する
        $game_form = $request->all();

        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $game_form['image_path'] = basename($path);
        } else {
            $game_form['image_path'] = $news->image_path;
        }

        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);

        // 該当するデータを上書きして保存する
        $game->fill($game_form)->save();

        return redirect('/create');
    }

    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $game = Game::find($request->id);

        // 削除する
        $game->delete();

        return redirect('/create');
    }
    
     public function show($id)
    {
        // 各モデルからデータを取得
        $game = Game::findOrFail($id);
        $genre = Genre::find($game->genre_id);
        $platform = Platform::find($game->platform_id);
        $playTime = Duration::find($game->durations_id);
        $imagePath = $game->image_path; // 画像パスを取得

        // 取得したデータをビューに渡す
        return view('show', compact('game', 'genre_name', 'machine_name', 'start_date', 'end_date'));
    }
}
    



