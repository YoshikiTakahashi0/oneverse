@extends('layouts.app')

@section('content')
<h1>タグ一覧</h1>
<div class='tags'>
    @foreach ($tags as $tag)
        <div class='tag'>
            <p class='name'>{{ $tag->name }}</p>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $tags->links() }}
</div>
@endsection