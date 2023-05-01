@extends('layouts.user')
@section('title', 'メモ詳細')

@section('content')
    <h1>{{ $game->title }}</h1>
    <p>ジャンル: {{ $genre->name }}</p>
    <p>機種: {{ $platform->name }}</p>
    <p>プレイ開始日: {{ $game->start_date }}</p>
    <p>プレイ終了日: {{ $game->end_date }}</p>
    <p>URL: {{ $game->url }}</p>
    <p>メモ: {!! nl2br(e($game->memo)) !!}</p>
    
    @if ($imagePath)
    <img src="{{ asset($imagePath) }}" alt="画像" />
    @endif
@endsection