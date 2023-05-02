@extends('layouts.user')


{{-- user.blade.phpの@yield('title')に'Gamememoryを埋め込む --}}
@section('title', 'Gamememory')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container_game">
        @foreach ($games as $game)
            <div>
                <img src="{{ $game->image_path ? secure_asset('storage/image/'. $game->image_path) : secure_asset('storage/image/no_image.png') }}" alt="{{ $game->title }}" style="width: 200px; height: 200px;">
                <h2>{{ $game->title }}</h2>
            </div>
        @endforeach
            
    </div>
@endsection
