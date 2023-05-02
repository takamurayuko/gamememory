@extends('layouts.user')

@section('title', 'メモ詳細')

@section('content')

    <div class="container">
        <h1>{{ $game->title }}</h1>
        <img src="{{ $game->image_path ? secure_asset('storage/image/'. $game->image_path) : secure_asset('storage/image/no_image.png') }}" alt="{{ $game->title }}" style="width: 200px; height: 200px;">
        <p>ジャンル: {{ $game->genre ? $game->genre->genre_name : '未設定' }}</p>
        <p>機種: {{ $game->platform ? $game->platform->platform_name : '未設定' }}</p>
        <p>プレイ開始日: {{ $game->start_date }}</p>
        <p>プレイ終了日: {{ $game->end_date }}</p>
        <p>URL: {{ $game->url }}</p>
        <p>メモ: {{ $game->memo }}</p>
    </div>
    
@endsection

