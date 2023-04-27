@extends('layouts.user')


{{-- user.blade.phpの@yield('title')に'Gamememoryを埋め込む --}}
@section('title', 'Gamememory')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Gamememory</h2>
            </div>
        </div>
    </div>
@endsection
