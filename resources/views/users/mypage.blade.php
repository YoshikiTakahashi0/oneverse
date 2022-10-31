@extends('layouts.app')

@section('content')
<h1>Mypage</h1>
<div class="main">
    <div class="headline">
        <h2 class="name">{{ $user->name }}</h2>
        <p class="image"><img width="70" height="70" src="{{ $user->image }}"></p>
        <div class="contributor">
            <a href='/mypage/{{ $user->id }}/edit'>プロフィールを編集する</a>
        </div>
    </div>
    <div class="follow">
        <p class="follows">フォロー</p>
        <p class="followers">フォロワー</p>
    </div>
</div>
@endsection