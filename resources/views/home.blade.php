@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='rank col'>
            <h2>ランキング</h2>
            <div class='posts'>
                @foreach ($rankposts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
                        <p class='body'>{{ $post->body }}</p>
                        <p class='plays'>再生数{{ $post->plays }}回</p>
                    </div>
                @endforeach
            </div>
            <div class="btn">
                <a href="/rank">もっと見る</a>
            </div>
        </div>
        <div class="news col">
            <h2>新着</h2>
            <div class='posts'>
                @foreach ($newposts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
                        <p class='body'>{{ $post->body }}</p>
                        <p class='created_at'>{{ $post->created_at }}</p>
                    </div>
                @endforeach
            </div>
            <a href="/posts/index">もっと見る</a>
        </div>
    </div>
</div>
@endsection
