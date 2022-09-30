@extends('layouts.login')

@section('content')
 {!! Form::open(['url'=>'/create']) !!}
<div class="top-area">
  <p class="icon">
            <a href="profile/{{Auth::user()->id}}"><img src="{{asset('storage/images/' . Auth::user()->images)}}" class="icon" width="60" height="60"></a>
          </p>
  {{ Form::hidden('userId',Auth::user()->id)}}
  {{ Form::text('newPost',null,['class' => 'new-post','placeholder' => '何をつぶやこうか...?']) }}
  @if ($errors->has('newPost'))
  <p class="error-message">{{ $errors->first('newPost') }}</p>
@endif
  <button type="submit" class="btn"><img src={{asset('images/post.png')}} alt=""></button>
  {!! Form::close() !!}
</div>
<div class="tweet">
  @foreach ($posts as $post)
  <div class="posts">
        <div class="posts-wrapper">
          <p class="icon">
            <a href="profile/{{$post->user_id}}"><img src={{asset('storage/images/' . $post->images)}} class="icon" width="60" height="60"></a>
          </p>
          <div class="content">
            <div class="head">
              <p class="user-name">{{$post->username}}</p>
              <p class="create-at">{{$post->post_create}}</p>
            </div>
              <p class="post">{{$post->posts}}</p>
          </div>
        </div>
        <div class="edit-btn">
        @if ($post->user_id === Auth::user()->id)
         <button class="btn modal-open" data-target={{"modal_$post->posts_id"}}><img class="edit" src={{asset('images/edit.png')}} alt="">
        </button>
        <div class="modal-wind" id={{"modal_$post->posts_id"}}>
          <div class="modal-container">
            {!! Form::open(['url'=>'/update']) !!}
            {{ Form::hidden('postId',$post->posts_id)}}
            {{ Form::hidden('postCreat',$post->post_create)}}
            <div class="modal-body">
            {{ Form::text('updatePost',null,['class' => 'update-post','placeholder' => $post->posts]) }}
            </div>
            <button type="submit" class="btn"><img src={{asset('images/edit.png')}} alt=""></button>
            {!! Form::close() !!}
          </div>
        </div>
         <a href="/delete/{{$post->posts_id}}" class="btn" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img class="delete" src={{asset('images/trash.png')}} alt="" >
        </a>
         @endif
    </div>
  </div>
  @endforeach
</div>
@endsection
