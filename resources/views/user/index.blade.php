@extends('layouts.user')


{{-- user.blade.phpの@yield('title')に'Gamememoryを埋め込む --}}
@section('title', 'Gamememory')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container_game">
        <div class="game-grid">
            @foreach ($games as $game)
                <div class="game-card">
                    <a href="{{ route('user.show', ['id' => $game->id]) }}">
                        <img src="{{ $game->image_path ? secure_asset('storage/image/'. $game->image_path) : secure_asset('storage/image/no_image.png') }}" alt="{{ $game->title }}" style="width: 350px; height: 350px;">
                    </a>
                    <a href="{{ route('user.show', ['id' => $game->id]) }}">
                        <h4>{{ $game->title }}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
