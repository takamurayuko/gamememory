<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Duration;

use Illuminate\Http\Request;

class GameController extends Controller
{
     public function add()
    {
        $genres = Genre::all();
        $platforms = Platform::$platform_list;
        
        return view('user.create', compact('genres', 'platforms'));
    }
    
    public function store(Request $request)
    {
        // Validationを行う
        $this->validate($request, Game::$rules);

        $games = new Game;
        $form = $request->all();
        
         // durationを作成して保存する
        $duration = new Duration;
        $duration->start_date = $form['start_date'];
        $duration->end_date = $form['end_date'];
        $duration->save();
    
        // Gameにdurationを関連付ける
        $games->duration()->associate($duration);
            
        // フォームから画像が送信されてきたら、保存して、$games->image_path に画像のパスを保存する
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
         // start_dateとend_dateを削除する
        unset($form['start_date']);
        unset($form['end_date']);

        // データベースに保存する
        $games->fill($form);
        $games->save();

        return redirect('/');
    }
    
    public function create()
    {
        $genres = Genre::all();
    
        return view('path.to.your.create.view', compact('genres'));
    }
    
     public function edit(Request $request)
    {
        // Game Modelからデータを取得する
        $game = Game::find($request->id);
        if (empty($game)) {
            abort(404);
        }
        
        $genres = Genre::all(); // ジャンルデータ取得
        $platforms = Platform::$platform_list;//機種データ取得        

        return view('user.edit', ['game_form' => $game, 'genres' => $genres, 'platforms' => $platforms]);
    }    
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Game::$rules);
        //  Modelからデータを取得する
        $game = Game::find($request->id);
        // 送信されてきたフォームデータを格納する
        $game_form = $request->all();

        // durationを更新する
        $duration = Duration::find($game->duration_id);
       
       if (!$duration) {
            $duration = new Duration;
            $duration->save();
            $game->duration_id = $duration->id;
            $game->save();
        }
       
        $duration->start_date = $game_form['start_date'];
        $duration->end_date = $game_form['end_date'];
        $duration->save();
           
       
        //画像処理
        if ($requeSSst->remove == 'true') {
            $game_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $game_form['image_path'] = basename($path);
        } else {
            $game_form['image_path'] = $game->image_path;
        }

        unset($game_form['image']);
        unset($game_form['remove']);
        unset($game_form['_token']);
        unset($game_form['start_date']);
        unset($game_form['end_date']);

        // 該当するデータを上書きして保存する
        $game->fill($game_form)->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        // 該当する Modelを取得
        $game = Game::find($request->id);

        // 削除する
        $game->delete();

        return redirect('/create');
    }
    
    public function show($id)
    {
        $game = Game::find($id);
        if (empty($game)) {
            abort(404);
        }
        return view('user.show', compact('game'));
    }

}
    



