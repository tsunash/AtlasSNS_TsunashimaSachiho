@extends('layouts.login')

@section('content')

@if( $users->id == Auth::id() )
<div class="auth-profile-box">

  <img src="{{asset('/images/'.$users->images)}}" class="icon">
  {{ Form::open(['route'=>'profile.edit','enctype'=>'multipart/form-data']) }}
  @foreach($errors->all() as $error)
    {{ $error }}<br>
  @endforeach
  @csrf
  <div class="profile-edit">
    <label for="username">ユーザー名</label>
    <input type="text" value="{{ $users->username }}" name="username" id="username" min="2" max="12" required>
  </div>
  <div class="profile-edit">
    <label for="mail">メールアドレス</label>
    <input type="email" value="{{ $users->mail }}" name="mail" id="mail" min="5" max="40" required>
  </div>
  <div class="profile-edit">
    <label for="password">パスワード</label>
    <input type="password" name="password" id="password" min="8" max="20" pattern="^[0-9a-zA-Z]+$" required>
  </div>
  <div class="profile-edit">
    <label for="password_confirmation">パスワード確認</label>
    <input type="password" name="password_confirmation" id="password_confirmation" min="8" max="20" required>
  </div>
  <div class="profile-edit">
    <label for="bio">自己紹介</label>
    <input type="text" value="{{ $users->bio }}" name="bio" id="bio" maxlength="150">
  </div>
  <div class="profile-edit">
    <label for="images">アイコン画像</label>
    <label for="images" class="custom-upload">ファイルを選択</label>
    <input type="file" name="images" id="images" accept=".jpg,.png,.bmp,.gif,.svg" class="file-upload">
  </div>
    <input type="hidden" name="id" value="{{ $users->id }}">
    <input type="submit" value="更新" class="profile-btn">
  {{ Form::close() }}
</div>

@else
<div class="profile-top">

  <img src="{{asset('/images/'.$users->images)}}" class="icon">

  <div class="profile-wrapper">
    <div class="other-profile">
      <p class="profile-title">ユーザー名</p>
      <p class="profile-text">{{ $users->username }}</p>
    </div>
    <div class="other-profile">
      <p class="profile-title">自己紹介</p>
      <p class="profile-text">{{ $users->bio }}</p>
    </div>
  </div>

  @if(!Auth::user()->isFollowing($users->id))

    {{ Form::open([ 'url'=>'/follow' ]) }}
    @csrf
    <input type="hidden" name="followed_id" value="{{ $users->id }}">
    <input type="submit" value="フォローする" class="follow-btn">
    {{ Form::close() }}

  @else
    {{ Form::open([ 'url'=>'/remove' ]) }}
    @csrf
    <input type="hidden" name="followed_id" value="{{ $users->id }}">
    <input type="submit" value="フォロー解除" class="remove-btn">
    {{ Form::close() }}
  @endif
</div>

<div>
  <ul>
  @foreach($posts as $post)
  <li class="timeline-list">
    <div class="timeline-box">
      <div class="tl-left">
        <img src="{{asset('/images/'. $post->user->images)}}" class="icon">
      </div>
    <div class="tl-middle">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->post }}</p>
    </div>
    <p class="tl-right">{{ $post->created_at}}</p>
    </div>
  </li>
  @endforeach
  </ul>
</div>
@endif
@endsection
