@extends('layouts.logout')

@section('content')

<h2 class="form-title">新規ユーザー登録</h2>

{!! Form::open(['url' => '/register']) !!}

@if($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li class="red">{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="form-box">

{{ Form::label('ユーザー名') }}<br>
{{ Form::text('username',null,['class' => 'input']) }}<br>

{{ Form::label('メールアドレス') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>

{{ Form::label('パスワード') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>

{{ Form::label('パスワード確認') }}<br>
{{ Form::password('password_confirmation',['class' => 'input']) }}<br>

{{ Form::submit('新規登録',['class' => 'btn register-btn']) }}
</div>

<p class="login-link"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
