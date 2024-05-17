@extends('layouts.login')

@section('content')



<div class="search-box">
  {{ Form::open(['url'=>'/search','class'=>'search-form']) }}
  @csrf
  {{ Form::input('text','keyword','',['placeholder'=>'ユーザー名','class'=>'search-text']) }}
  <input type="image" src="/images/search.png" class="btn" alt="検索">
  {{ Form::close() }}

  @if(isset($keyword))
  <p>検索ワード：{{ $keyword }}</p>
  @endif
</div>

<div>
  <ul>
    @foreach($users as $user)
      <li class=search-list>
        <img src="/images/{{ $user->images }}" class="icon">
        <p>{{ $user->username }}</p>

@if(!Auth::user()->isFollowing($user->id))
{{ $user->id }}
        {{ Form::open(['url'=>'/follow']) }}
          @csrf
          <input type="hidden" name="followed_id" value="{{ $user->id }}">
          <input type="submit" value="フォローする">
        {{ Form::close() }}
@else
        {{ Form::open(['url'=>'/remove']) }}
          @csrf
          <input type="hidden" name="followed_id" value="{{ $user->id }}">
          <input type="submit" value="フォロー解除">
        {{ Form::close() }}
@endif
      </li>
    @endforeach
  </ul>
</div>


@endsection
