@extends('layouts.app')

@section('content')
<h1>タグ一覧</h1>
<div class='tags'>
    @foreach ($tags as $tag)
        <div class='tag'>
            <h2 class='name'>
                <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
            </h2>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $tags->links() }}
</div>
@endsection