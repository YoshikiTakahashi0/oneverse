@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='rank col'>
            <h2>ランキング</h2>
            <div class='posts card'>
                @foreach ($rankposts as $post)
                    <div class='post card mb-3' style="height: 180px">
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
                                    <p class='plays card-text col'><small class="text-muted">再生数{{ $post->plays }}回</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn btn-secondary">
                <a href="/rank" class="text-white" style="text-decoration:none;">もっと見る</a>
            </div>
        </div>
        <div class="news col">
            <h2>新着</h2>
            <div class='posts card'>
                @foreach ($newposts as $post)
                    <div class='post card mb-3' style="height: 180px">
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
                                    <p class='created_at card-text col'><small class="text-muted">{{ $post->created_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn btn-secondary">
                <a href="/posts/index" class="text-white" style="text-decoration:none;">もっと見る</a>
            </div>
        </div>
    </div>
</div>
@endsection
