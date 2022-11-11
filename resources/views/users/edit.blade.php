@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>ユーザー情報編集</h1>
    </div>
    <div class="content">
        <div class="image">
            <h3>プロフィール画像</h3>
            <p class='image'><img width="70" height="70" src="{{ $user->image }}"></p>
            <a href="/mypage/{{ $user->id }}/edit/image" style="text-decoration:none;">画像を変更</a>
        </div>
        <form action="/mypage/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>{{ __('Name') }}</h2>
                <input type="text" name="user[name]" value="{{ $user->name }}">
                <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
            </div>
            <div class="body">
                <h2>{{ __('プロフィール欄') }}</h2>
                <input type="text" name="user[body]" value="{{ $user->body }}">
                <p class="body__error" style="color:red">{{ $errors->first('user.body') }}</p>
            </div>
            <div class="email">
                <h2>{{ __('E-Mail Address') }}</h2>
                <input type="email" name="user[email]" value="{{ $user->email }}">
                <p class="email__error" style="color:red">{{ $errors->first('user.email') }}</p>
            </div>
            <input type="submit" value="変更">
        </form>
    </div>
    <div class="back">[<a href="/mypage/{{ $user->id }}" style="text-decoration:none;">戻る</a>]</div>
</div>
@endsection