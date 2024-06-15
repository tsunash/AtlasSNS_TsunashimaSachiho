@extends('layouts.login')

@section('content')

<div class="follow-top">
  <h2>フォロワーリスト</h2>
  <div class="icon-wrapper">
    @foreach($followed as $follow)
    <a href="/profile/{{ $follow->id }}">
    <img src="/images/{{ $follow->images }}" class="icon">
    </a>
    @endforeach
  </div>
</div>

<div>
  <ul>
@foreach($followed_posts as $post)
  <li class="timeline-list">
    <div class="timeline-box">
      <div class="tl-left">
        <a href="/profile/{{ $post->user_id }}">
        <img src="/images/{{ $post->user->images }}" class="icon">
      </a>
      </div>
      <div class="tl-middle">
        <p>{{ $post->user->username }}</p>
        <p>{!! nl2br(e($post->post)) !!}</p>
      </div>
      <p class="tl-right">{{ substr($post->created_at,0,16) }}</p>
    </div>
  </li>
@endforeach
</ul>
</div>


@endsection
