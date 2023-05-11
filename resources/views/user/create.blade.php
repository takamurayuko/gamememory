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
                        <label class="col-md-2">ジャンル(必須)</label>
                            <div class="col-md-10">
                                <select name="genre_name" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach (App\Models\Genre::$genre_list as $genre)
                                        <option value="{{ $genre }}" {{ old('genre_name') == $genre ? 'selected' : '' }}>
                                            {{ $genre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-2">機種(必須)</label>
                            <div class="col-md-10">
                                <select name="platform_name" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform }}" {{ old('platform_name') == $platform ? 'selected' : '' }}>
                                            {{ $platform }}
                                        </option>
                                    @endforeach
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
                            <label class="col-md-2">プレイ時間</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="play_time" value="{{ old('title') }}">
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
                                <textarea class="form-control" name="memo" rows="20">{{ old('title') }}</textarea>
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