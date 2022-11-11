@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>Mypage</h1>
    </div>
    <div class="row g-0">
        <div class="col-md-6">
            <p class="image"><img src="{{ $user->image }}" class="img-fluid rounded float-start border img-thumbnail"></p>
        </div>
        <div class="col-md-6">
            <div class="ml-5">
                <div class="headline">
                    <h2 class="name">{{ $user->name }}</h2>
                    <p class="body">{{ $user->body }}</p>
                    <div class="contributor">
                        <a href='/mypage/{{ $user->id }}/edit' style="text-decoration:none;">編集</a>
                    </div>
                </div>
                <div class="follow row my-2">
                    <p class="follows col-4">フォロー{{ $user->getFollowCount() }}</p>
                    <p class="followers col-4">フォロワー{{ $user->getFollowerCount() }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="posts card my-4">
                @foreach ($posts as $post)
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
                                    <p class='plays card-text col'><small class="text-muted">閲覧数{{ $post->plays }}回</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="footer">
        <a href='{{ url()->previous() }}' style="text-decoration:none;">戻る</a>
    </div>
</div>
@endsection