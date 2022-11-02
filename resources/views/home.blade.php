@extends('layouts.app')

@section('content')
<div class='rank'>
    <h2>ランキング</h2>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='plays'>再生数{{ $post->plays }}回</p>
                <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
                <p class='body'>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
    <a href="/rank">もっと見る</a>
</div>
<div class="news">
    <h2>ここに新着入れたい</h2>
    <a href="/posts/index">もっと見る</a>
</div>
@endsection
