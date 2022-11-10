@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>タグ一覧</h1>
    </div>
    <div class='tags'>
        @foreach ($tags as $tag)
            <div class='tag'>
                <h2 class='name'>
                    <a href="/tags/{{ $tag->id }}" style="text-decoration:none;">{{ $tag->name }}</a>
                </h2>
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $tags->links() }}
    </div>
</div>
@endsection