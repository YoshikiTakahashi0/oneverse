@extends('layouts.app')

@section("head")

@section('content')
<h1>投稿</h1>
<form action="/posts" method= "POST" enctype="multipart/form-data">
    @csrf
    <div class="music">
        <h2>Music</h2>
        <input type="file" name="music" value="{{ old('music') }}"/>
        <p class="music__error" style="color:red">{{ $errors->first('music') }}</p>
    </div>
    <div class="image">
        <h2>Image</h2>
        <input type="file" name="image" value="{{ old('image') }}"/>
        <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
    </div>
    <div class="title">
        <h2>Title</h2>
        <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
    </div>
    <div class="body">
        <h2>Body</h2>
        <textarea name="post[body]" placeholder="例:prod by 〇〇〇">{{ old('post.body') }}</textarea>
        <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
    </div>
    <div class="tag_id">
        <label for="tag">{{ __('タグ') }}"</label>
        <select class="form-control" id="id" name="tag_id">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="保存"/>
</form>
<div class="back">[<a href="/">back</a>]</div>
@endsection