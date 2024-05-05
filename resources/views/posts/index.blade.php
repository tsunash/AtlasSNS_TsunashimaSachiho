@extends('layouts.login')

@section('content')

<div class=post-box>
  {{ Form::open(['action' => 'PostsController@postCreate']) }}
  @csrf
  <img src='/images/{{ Auth::user()->images }}'>
  {{ Form::textarea('post','',['class'=>'post-form','placeholder'=>'投稿内容を入力してください。','minlenght'=>'1','maxlength'=>'150','required']) }}
  <input type="image" name="submit" src="/images/post.png" alt= "送信" class="submit-btn btn">
  {{ Form::close() }}
</div>
<div class=timeline-box>
  <ul>
      @foreach($posts as $post)
        <li>
          <div class="tl-left">
            <img src="/images/{{ $post->user->images }}">
          </div>
          <div class="tl-middle">
            <p> {{ $post->user->username }}</p>
            <p> {{ $post->post }}</p>
          </div>
          <div class="tl-right">
            <p>{{ $post->created_at }}</p>
            <div>
              @if($post->user_id == Auth::user()->id)
              <a class="modalopen" post="{{ $post->post }}" post_id="{{ $post->id }}"><img class="edit-btn btn" src="images/edit.png" alt="編集"></a>
              <a href=""><img class="delete-btn btn" src="images/trash.png" alt="削除"></a>
              @endif
            </div>
          </div>
        </li>

              <!-- モーダルウィンドウ  -->
          <div class=modal-main>
            <div class="modal-inner">
            </div>
            <div class="modal-box">
              {{ form::open(['action' => 'PostsController@edit','class' => 'modal-form']) }}
                @csrf
                <textarea class="edit-post" name="post" min-length=1 max-length=150 required></textarea>
                <input type="hidden" class="edit-id" name="id">
                <input type="image" src="/images/edit.png" class="edit-btn btn">
              {{ form::close() }}
            </div>
          </div>


      @endforeach
  </ul>
</div>

<script src="js/app.js"></script>
<script type="text/javascript">

  $(function(){
      $('.modalopen').each(function(){
        $(this).on('click',function(){
        $('.modal-main').fadeIn();
        var post = $(this).attr('post');
        var post_id = $(this).attr('post_id');
        $('.edit-post').val(post);
        $('.edit-id').val(post_id);
        return false;
        });

      $('.modal-inner').on('click',function(){
        $('.modal-main').fadeOut();
        return false;
      });
      });
  });
</script>



@endsection
