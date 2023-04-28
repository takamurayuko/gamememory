@extends('layouts.user')
@section('title', '新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 style="text-align:center;">新規登録</h2>
                <form action="{{ route('user.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル(必須)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル</label>
                        <div class="col-md-10">
                            <select name="genre_name" class="form-control">
                                <option value="">選択してください</option>
                                <option value="RPG">ＲＰＧ</option>
                                <option value="アクション">アクション</option>
                                <option value="シミュレーション">シミュレーション</option>
                                <option value="アドベンチャー">アドベンチャー</option>
                                <option value="シューティング">シューティング</option>
                                <option value="レーシング">レーシング</option>
                                <option value="パズル">パズル</option>
                                <option value="音楽">音楽</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">機種</label>
                        <div class="col-md-10">
                            <select name="machine_name" class="form-control">
                                <option value="">選択してください</option>
                                <option value="Nintendo Swich">Ｎｉｎｔｅｎｄｏ Ｓｗｉｃｈ</option>
                                <option value="PS4/PS5">ＰＳ４/ＰＳ５</option>
                                <option value="Xbox">Ｘｂｏｘ</option>
                                <option value="PC">ＰＣ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">プレイ開始日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="start_date" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">プレイ終了日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="end_date" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ＵＲＬ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="url" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection