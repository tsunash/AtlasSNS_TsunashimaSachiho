@extends('layouts.login')

@section('content')
<p>フォローリスト</p>

<div>
@foreach($follows as $follow)
<a href="/profile/{{ $follow->id }}">
<img src="/images/{{ $follow->images }}" class="icon">
</a>
@endforeach
</div>

<div>
@foreach($follows_posts as $post)
<a href="/profile/{{ $post->user_id }}" >
<img src="/images/{{ $post->user->images }}" class="icon">
</a>
{{ $post->user->username }}
{{ $post->post }}
{{ $post->created_at }}
<br>
@endforeach
</div>


@endsection
