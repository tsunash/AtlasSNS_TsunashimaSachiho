@extends('layouts.login')

@section('content')

@if( $users->id == Auth::id() )
<div>
  <p>自分のプロフィール</p>
  {{ $users }}
  <form>
    画像
    ユーザー名
    メールアドレス
    パスワード
    パスワード確認
    自己紹介
    アイコン画像
  </form>
</div>

@else
  {{ $users }}
<div>
  <p>相手のプロフィール</p>



  <img src="/images/{{ $users->images }}">
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
  <img src="/images/{{ $post->user->images}}">
  {{ $post->user->username }}
  {{ $post->post }}
  {{ $post->created_at}}
  <br>
@endforeach
</div>

@endif


@endsection
