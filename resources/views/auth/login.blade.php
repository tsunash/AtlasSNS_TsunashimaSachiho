@extends('layouts.logout')

@section('content')

<p class="form-title">AtlasSNSへようこそ</p>

{!! Form::open(['url' => '/login']) !!}

@if($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="form-box">

{{ Form::label('メールアドレス')}}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
{{ Form::label('パスワード') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>

{{ Form::submit('ログイン',['class' =>'btn login-btn']) }}
{!! Form::close() !!}
</div>

<p class="register-link"><a href="/register">新規ユーザーの方はこちら</a></p>
@endsection
