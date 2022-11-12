@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>{{ $tag->name }}タグ閲覧順</h1>
    </div>
    <div class="sort-item row my-2 justify-content-center">
        <p class="new col-3">
            <a href="/tags/{{ $tag->id }}" style="text-decoration:none;">新着順</a>
        </p>
        <p class="rank col-3">
            <a href="/tags/{{ $tag->id }}/rank" style="text-decoration:none;">閲覧数順</a>
        </p>
    </div>
    <div class="row col">
        <div class='posts card'>
            @foreach ($posts as $post)
                <div class='post card' style="max-width: 1300px">
                    <div class="row g-0">
                        <div class="col-md-4 flex-container"> 
                            <div class="flex-item">
                                <div class="image-wrap">
                                    <p class='image'><img src="{{ $post->image }}" class="img-fluid rounded float-start border img-thumbnail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class='title card-title col'>
                                    <a href="/posts/{{ $post->id }}" style="text-decoration:none;">{{ $post->title }}</a>
                                </h2>
                                <p class='plays card-text col'><small class="text-muted">閲覧数{{ $post->plays }}回</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <div class="footer">
        <a href='{{ url()->previous() }}' style="text-decoration:none;">戻る</a>
    </div>
@endsection