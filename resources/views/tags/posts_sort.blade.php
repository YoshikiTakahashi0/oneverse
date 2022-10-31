@extends('layouts.app')

@section('content')
<h1>{{ $tag->name }}タグ新着</h1>
<div class="sort-item">
    <p class="new">
        <a href="/tags/{{ $tag->id }}">新着順</a>
    </p>
    <p class="rank">
        <a href="/tags/{{ $tag->id }}/rank">再生順</a>
    </p>
</div>
<div class='posts'>
    @foreach ($posts as $post)
        <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
            <p class='body'>{{ $post->body }}</p>
        </div>
    @endforeach
</div>
<div class="footer">
    <a href='{{ url()->previous() }}'>戻る</a>
</div>
@endsection