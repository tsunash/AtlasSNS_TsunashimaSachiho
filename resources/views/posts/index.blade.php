@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<div class=post-box>
  {{ Form::open(['action' => 'PostsController@postCreate']) }}
  <img src='/images/{{ Auth::user()->images }}'>
  {{ Form::textarea('post','',['class'=>'post-form','placeholder'=>'投稿内容を入力してください。','minlenght'=>'1','maxlength'=>'150','required']) }}
  <input type="image" name="submit" src="/images/post.png" alt= "送信" class="submit-btn">
  {{ Form::close() }}
</div>
<div>
  <ul>
     <li>
      <img src="/images/icon1.png">
      <p>ユーザー名</p>
      <p>投稿内容</p>
     </li>
  </ul>
</div>


@endsection
