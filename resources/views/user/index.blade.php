@extends('layouts.user')


{{-- user.blade.phpの@yield('title')に'Gamememoryを埋め込む --}}
@section('title', 'Gamememory')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container_game">
        <div class="game-grid">
            @if (isset($games))
                @if (count($games) > 0)
                    @foreach ($games as $game)
                        <div class="game-card">
                            <a href="{{ route('user.show', ['id' => $game->id]) }}">
                                <img src="{{ $game->image_path ? secure_asset('storage/image/'. $game->image_path) : secure_asset('storage/image/no_image.png') }}" alt="{{ $game->title }}" style="width: 330px; height: 330px;">
                            </a>
                            <a href="{{ route('user.show', ['id' => $game->id]) }}">
                                <h4>{{ $game->title }}</h4>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>該当するゲームは見つかりませんでした。</p>
                @endif
            @endif
        </div>
    </div>
@endsection
