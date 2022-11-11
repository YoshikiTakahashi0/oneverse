@extends('layouts.app')

@section("head")

@section('content')
<div class="container">
    <div class="row col">
        <h1>新着</h1>
    </div>
    <div class="row col">
        <div class='posts card'>
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
                                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                </h2>
                                <p class='created_at card-text col'>{{ $post->created_at }}</p>
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