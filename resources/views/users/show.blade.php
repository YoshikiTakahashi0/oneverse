@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>ユーザーページ</h1>
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
                    @if(Auth::check())
                        @if(!(Auth::user() == $user))
                            @if($user->followers()->where('id', Auth::id())->exists())
                                <div class="btn btn-secondary">
                                    <a href="/users/{{ $user->id }}/unfollow" class="text-white" style="text-decoration:none;">フォロー解除</a>
                                </div>
                            @else
                                <div class="btn btn-primary">
                                    <a href="/users/{{ $user->id }}/follow" class="text-white" style="text-decoration:none;">フォローする</a>
                                </div>
                            @endif
                        @endif
                    @endif
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
                                        <p class='image'><img src="{{ $post->image }}"class="img-fluid rounded float-start border img-thumbnail"></p>
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
    <div class="footer">
        <a href='{{ url()->previous() }}' style="text-decoration:none;">戻る</a>
    </div>
</div>
@endsection