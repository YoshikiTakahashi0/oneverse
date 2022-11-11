@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>プロフィール画像変更</h1>
    </div>
    <div class="content">
        <form action="/mypage/image/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="image">
                <input type="file" name="image"/>
                <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
            </div>
            <input type="submit" value="変更">
        </form>
    </div>
    <div class="back">[<a href="/mypage/{{ $user->id }}/edit" style="text-decoration:none;">戻る</a>]</div>
</div>
@endsection