@extends('layouts.app')

@section('content')
<h1>ユーザーランキング</h1>
<div class="rank-item">
    <p class="plays">
        <a href="/rank">再生数</a>
    </p>
    <p class="reviews">
        <a href="/rank/reviews">レビュー評価</a>
    </p>
    <p class="users">
        <a href="/rank/users">ユーザー</a>
    </p>
</div>
<div class='plays'>
    <div class='users'>
        @foreach ($users as $user)
            <div class='user'>
                <h2 class='name'>
                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                </h2>
                <p class='image'><img width="70" height="70" src="{{ $user->image }}"></p>
                <p class="plays"></p>
            </div>
        @endforeach
    </div>
</div>
<div class='paginate'>
    {{ $users->links() }}
</div>
@endsection