@extends('layouts.login')

@section('content')

<div>
<p>フォロワーリスト</p>
@foreach($followed as $follow)
<a href="/profile/{{ $follow->id }}">
<img src="/images/{{ $follow->images }}" class="icon">
</a>
@endforeach
</div>

<div>
@foreach($followed_posts as $post)
<a href="/profile/{{ $post->user_id }}">
<img src="/images/{{ $post->user->images }}" class="icon">
</a>
{{ $post->user->username }}
{{ $post->post }}
{{ $post->created_at }}
<br>

@endforeach
</div>


@endsection
