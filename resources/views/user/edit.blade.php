@extends('layouts.user')
@section('title', '記事編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記事編集</h2>
                <form action="{{ route('game.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $game_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ジャンル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="genre_name" value="{{ $game_form->genre_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">機種</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="machine_name" value="{{ $game_form->machine_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">プレイ開始日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="start_date" value="{{ $game_form->start_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">プレイ終了日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="end_date" value="{{ $game_form->end_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ＵＲＬ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="url" value="{{ $game_form->url }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="memo">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="20">{{ $news_form->memo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $news_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $game_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection