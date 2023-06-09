<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます(user.scss)        --}}
        <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">

        <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
        />
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ secure_asset('storage/image/logo.png') }}" alt="{{ config('app.name', 'Gamememory') }}" style="max-height: 19px;">
                    </a>
                     

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                        </ul>

                        <!--Right Side Of Navbar -->
                        <ul class="navbar-nav">
                               {{-- 以下を追記 --}}
                        <!--Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            {{-- 以上までを追記 --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!--ここからメニュー-->
             <!-- toggle section -->
             
            <input type="checkbox" id="check" />
            <label for="check">
              <i class="fas fa-bars" id="btn"></i>
              <i class="fas fa-times" id="cancel"></i>
            </label>
            
            <!-- sidebar section -->
            <div class="sidebar">
                <div class="register">
                    <a href="{{ route('user.create') }}">新規登録</a>
                </div>
                <ul>
                    <li>
                        <div class="search-box">
                            <form id="search-form" action="{{ route('user.index') }}" method="GET">
                                <input type="text" name="keyword" value="{{ old('keyword', '') }}" placeholder="タイトル検索" class="search-input">
                            </form>
                            <button type="button" class="search-button" onclick="document.getElementById('search-form').submit();">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </li>     
                    <li>
                        <div class="genre">ジャンル</div>
                    </li>
                    <div class="genre_name a">
                        <li>
                            <a href="{{ url('/games/genre/RPG') }}">RPG</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/アクション') }}">アクション</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/シミュレーション') }}">シミュレーション</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/アドベンチャー') }}">アドベンチャー</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/シューティング') }}">シューティング</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/レーシング') }}">レーシング</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/パズル') }}">パズル</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/音楽') }}">音楽</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/genre/その他') }}">その他</a>
                        </li>
                    </div> 
                    
                    <li>
                        <div class="machine">プラットフォーム</div>
                    </li>
                    <div class="genre_name a">
                        <li>
                            <a href="{{ url('/games/platform/NintendoSwitch') }}">Nintendo Switch</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/platform/ＰＳ４ＰＳ５') }}">ＰＳ４/ＰＳ５</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/platform/Ｘｂｏｘ') }}">Ｘｂｏｘ</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/platform/ＰＣ') }}">ＰＣ</a>
                        </li>
                        <li>
                            <a href="{{ url('/games/platform/その他') }}">その他</a>
                        </li>
                    </div>    
                </ul>
            </div>
            <!--<section></section>-->
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>