@extends('layouts.app')

@section("head")

@section('content')
<h1>投稿</h1>
<form action="/posts" method= "POST" enctype="multipart/form-data">
    @csrf
    <div class="music">
        <h2>Music</h2>
        <input type="file" name="music">
    </div>
    <div class="title">
        <h2>Title</h2>
        <input type="text" name="post[title]" placeholder="タイトル"/>
    </div>
    <div class="body">
        <h2>Body</h2>
        <textarea name="post[body]" placeholder="例:prod by 〇〇〇"></textarea>
    </div>
    <input type="submit" value="保存"/>
</form>
<div class="back">[<a href="/">back</a>]</div>
@endsection