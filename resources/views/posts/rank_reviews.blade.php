@extends('layouts.app')

@section('content')
<h1>レビュー評価ランキング</h1>
<div class="rank-item">
    <p class="plays">
        <a href="/rank">再生数</a>
    </p>
    <p class="reviews">
        <a href="/rank/reviews">レビュー評価</a>
    </p>
    <p class="users">
        <a href="/rank/users">ユーザー別</a>
    </p>
</div>
<div class='plays'>
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
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection