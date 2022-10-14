@extends('layouts.app')

@section('content')
<h1 class="title">
    {{ $post->title }}
</h1>
<div class="content">
    <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
    <p class='music'><video controls width="300" height="300" src="{{ $post->music }}"></p>
    <p class='body'>{{ $post->body }}</p>
</div>
<div class="footer">
    <a href='/posts/index'>新着へ</a>
</div>
<div class="Contributor">
</div>
@endsection