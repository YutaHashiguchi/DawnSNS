@extends('layouts.login')

@section('content')
<div class="top-area" >
  <h2>Follower list</h2>
  <div id="iconArea">
  @foreach ($userIcons as $userIcon)
      <div class="user-icon">
        <p class="icon">
          <a href="profile/{{$userIcon->follow_id}}"><img src="storage/images/{{ $userIcon->images}}" class="icon" width="60" height="60"></a>
        </p>
      </div>
  @endforeach
  </div>
</div>
<div class="tweet">
  @foreach ($posts as $post)
  <div class="posts">
        <div class="posts-wrapper">
          <p class="icon">
            <a href="profile/{{$post->user_id}}"><img src="storage/images/{{ $post->images}}" class="icon" width="60" height="60"></a>
          </p>
          <div class="content">
            <div class="head">
              <p class="user-name">{{$post->username}}</p>
              <p class="create-at">{{$post->created_at }}</p>
            </div>
              <p class="post">{{$post->posts}}</p>
          </div>
        </div>
  </div>
  @endforeach
</div>
@endsection
