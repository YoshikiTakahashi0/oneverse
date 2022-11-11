@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col">
        <h1>ユーザーランキング</h1>
    </div>
    <div class="rank-item row justify-content-center">
        <p class="plays col-3">
            <a href="/rank" style="text-decoration:none;">閲覧数</a>
        </p>
        <p class="reviews col-3">
            <a href="/rank/reviews" style="text-decoration:none;">レビュー評価</a>
        </p>
        <p class="users col-3">
            <a href="/rank/users" style="text-decoration:none;">ユーザー</a>
        </p>
    </div>
    <div class="row col">
        <div class='users card'>
            @foreach ($users as $user)
                <div class='user card md-3' style="height: 180px">
                    <div class="row g-0">
                        <div class="col-md-4 flex-container">
                            <div class="flex-item">
                                <div class="image-wrap">
                                    <p class='image'><img src="{{ $user->image }}" class="img-fluid rounded float-start border img-thumbnail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class='name card-title col'>
                                    <a href="/users/{{ $user->id }}" style="text-decoration:none;">{{ $user->name }}</a>
                                </h2>
                                <p class="rating card-text col">☆{{  $user->rating}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class='paginate'>
    {{ $users->links() }}
</div>
@endsection