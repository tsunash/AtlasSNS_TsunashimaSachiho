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

</div>

@endif


@endsection
