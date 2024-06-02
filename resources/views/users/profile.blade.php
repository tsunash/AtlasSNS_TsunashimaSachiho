@extends('layouts.login')

@section('content')

@if( $users->id == Auth::id() )
<div>
  <p>自分のプロフィール</p>
  {{ $users }}


  <img src="{{asset('/images/'.$users->images)}}" class="icon">
  {{ Form::open(['route'=>'profile.edit','enctype'=>'multipart/form-data']) }}
  @csrf
    <label for="username">ユーザー名</label>
    <input type="text" value="{{ $users->username }}" name="username" id="username" min="2" max="12" required>

    <label for="mail">メールアドレス</label>
    <input type="email" value="{{ $users->mail }}" name="mail" id="mail" min="5" max="40" required>

    <label for="password">パスワード</label>
    <input type="password" name="password" id="password" min="8" max="20" pattern="^[0-9a-zA-Z]+$" required>

    <label for="password_confirmation">パスワード確認</label>
    <input type="password" name="password_confirmation" id="password_confirmation" min="8" max="20" required>

    <label for="bio">自己紹介</label>
    <input type="text" value="{{ $users->bio }}" name="bio" id="bio" maxlength="150">

    <label for="images">アイコン画像</label>
    <input type="file" name="images" id="images" accept=".jpg,.png,.bmp,.gif,.svg">

    <input type="hidden" name="id" value="{{ $users->id }}">
    <input type="submit" value="更新">
  {{ Form::close() }}
</div>

@else
  {{ $users }}
<div>
  <p>相手のプロフィール</p>

  <img src="{{asset('/images/'.$users->images)}}">

  <p>ユーザー名</p>
  {{ $users->username }}
  <p>自己紹介</p>
  {{ $users->bio }}


  @if(!Auth::user()->isFollowing($users->id))

    {{ Form::open([ 'url'=>'/follow' ]) }}
    @csrf
    <input type="hidden" name="followed_id" value="{{ $users->id }}">
    <input type="submit" value="フォローする">
    {{ Form::close() }}

  @else

    {{ Form::open([ 'url'=>'/remove' ]) }}
    @csrf
    <input type="hidden" name="followed_id" value="{{ $users->id }}">
    <input type="submit" value="フォロー解除">
    {{ Form::close() }}

  @endif

</div>

<div>
  @foreach($posts as $post)
  <img src="{{asset('/images/'. $post->user->images)}}">
  {{ $post->user->username }}
  {{ $post->post }}
  {{ $post->created_at}}
  <br>
  @endforeach
</div>

@endif


@endsection
