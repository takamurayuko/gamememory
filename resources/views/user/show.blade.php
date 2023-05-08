@extends('layouts.user')

@section('title', 'メモ詳細')

@section('content')

    <div class="container_show">
        <img src="{{ $game->image_path ? secure_asset('storage/image/'. $game->image_path) : secure_asset('storage/image/no_image.png') }}" alt="{{ $game->title }}" style="width: 300px; height: 300px;">
        <div class="text-container">
            <h4>{{ $game->title }}</h4>
            <p>ジャンル: {{ $game->genre ? $game->genre->genre_name : '未設定' }}</p>
            <p>機種: {{ $game->platform ? $game->platform->machine_name : '未設定' }}</p>
            <p>プレイ開始日: {{ $game->start_date('未設定') }}</p>
            <p>プレイ終了日: {{ $game->end_date('未設定') }}</p>
            <p>プレイ時間: {{ $game->play_time('未設定') }}</p>
            <p>ＵＲＬ: {{ $game->url('未設定') }}</p>
            <p id="toggle-button">メモ▼(開)</p>
            <p id="toggle-content" style="display: none;">{{ $game->memo }}</p>
            <a href="{{ route('user.edit', ['id' => $game->id]) }}" class="edit-button">編集</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="delete-button">削除</a>
            <form action="{{ route('user.destroy', ['id' => $game->id]) }}" method="post" style="display:inline" id="delete-form">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
    
        <script>
            document.getElementById('toggle-button').onclick = function() {
                var content = document.getElementById('toggle-content');
                var button = document.getElementById('toggle-button');
                if (content.style.display === 'none') {
                    content.style.display = 'block';
                    button.innerHTML = "メモ▲(閉)"; 
                } else {
                    content.style.display = 'none';
                    button.innerHTML = "メモ▼(開)"; 
                }
            };
        </script>

@endsection

