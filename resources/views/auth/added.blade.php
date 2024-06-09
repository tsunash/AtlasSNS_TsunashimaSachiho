@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="bold">
    <p><span>{{ session('username') }}さん</span></p>
    <p>ようこそ！AtlasSNSへ</p>
  </div>
  <div>
  <p>ユーザー登録が完了いたしました。</p>
  <p>早速ログインをしてみましょう！</p>
  </div>
  <p class="btn to-login-btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
