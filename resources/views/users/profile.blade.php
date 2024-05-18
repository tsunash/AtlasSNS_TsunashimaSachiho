@extends('layouts.login')

@section('content')

<div>
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

@endsection
