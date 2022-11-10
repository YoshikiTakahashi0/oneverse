@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>再生数ランキング</h1>
    </div>
    <div class="rank-item row justify-content-center">
        <p class="plays col-3">
            <a style="text-decoration:none;" href="/rank">再生数</a>
        </p>
        <p class="reviews col-3">
            <a style="text-decoration:none;" href="/rank/reviews">レビュー評価</a>
        </p>
        <p class="users col-3">
            <a style="text-decoration:none;" href="/rank/users">ユーザー別</a>
        </p>
    </div>
    <div class="row col">
        <div class="plays card">
            @foreach ($posts as $post)
                <div class='post card' style="height: 180px">
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
                                    <a style="text-decoration:none;" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                </h2>
                                <p class='plays card-text col'><small class="text-muted">再生数{{ $post->plays }}回</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection