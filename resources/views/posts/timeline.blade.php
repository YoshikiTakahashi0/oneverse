@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{secure_asset('css/image.css') }}">
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col">
            <h1>タイムライン</h1>
            <div class='posts card'>
                @foreach ($posts as $post)
                    <div class="card mb-3" style="max-width: 1300px">
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
                                    <div class="row">
                                        <div class="user">
                                            <p class="image"><img width="30" height="30" src="{{ $post->user->image }}" class=""></p>
                                            <p class='name'>
                                                <a style="text-decoration:none;" href='/users/{{ $post->user->id }}' class="">{{ $post->user->name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class='post'>
                                        <h2 class='title card-title col'>
                                            <a style="text-decoration:none;" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                        </h2>
                                        <p class='created_at card-text col'><small class="text-muted">{{ $post->created_at }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection