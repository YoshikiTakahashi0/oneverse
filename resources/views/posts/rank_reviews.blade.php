@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>レビュー評価ランキング</h1>
    </div>
    <div class="rank-item row justify-content-center">
        <p class="plays col-3">
            <a href="/rank" style="text-decoration:none;">閲覧数</a>
        </p>
        <p class="reviews col-3">
            <a href="/rank/reviews" style="text-decoration:none;">レビュー評価</a>
        </p>
        <p class="users col-3">
            <a href="/rank/users" style="text-decoration:none;">ユーザー別</a>
        </p>
    </div>
    <div class="row col">
        <div class='plays card'>
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
                                    <a href="/posts/{{ $post->id }}" style="text-decoration:none;">{{ $post->title }}</a>
                                </h2>
                                <p class="rating card-text col"><small class="text-muted">☆{{ $post->total_rating }}</small></p>
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