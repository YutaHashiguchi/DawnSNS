@extends('layouts.login')

@section('content')
@if ($userId == Auth::user()->id)
@foreach ($profiles as $profile)
<div class="my-profile">
  <p class="icon"><img src="{{ asset('storage/images/'. $profile->images) }} " class="icon" width="60" height="60"></p>
  {!! Form::open(['url'=>'/profile_update','files' => true]) !!}
    <div class="profile-wrapper">
      {{ Form::label('UserName') }}
     <p class="myprofile-input">{{ Form::text('username',null,['placeholder' => Auth::user()->username])}}</p>
    </div>
    <div class="profile-wrapper">
      {{ Form::label('MailAdress') }}
      <p class="myprofile-input">{{ Form::text('mail',null,['placeholder' => Auth::user()->mail])}}</p>
    </div>
    <div class="profile-wrapper">
      {{ Form::label('Password') }}
      <p class="myprofile-input my-password">{{ str_repeat('●', $passCount)}}</p>
    </div>
    <div class="profile-wrapper">
      {{ Form::label('new Password') }}
      <p class="myprofile-input">{{ Form::password('newpass',['class' => 'none-outline'])}}</p>
    </div>
    <div class="profile-wrapper">
      {{ Form::label('Bio') }}
      <p class="myprofile-input">{{ Form::textarea('bio',null,['wrap' => 'soft','placeholder' => Auth::user()->bio,'rows'=>'0','class' => 'bioarea'])}}</p>
    </div>
    <div class="profile-wrapper">
      {{ Form::label('Icon Image') }}
      <label class="myprofile-input file-input">
        <span class='file-select'>ファイルを選択</span>
        {{ Form::file('image',['style'=>'display:none'])}}
      </label>
    </div>
    <button type="submit" class="update"><p class="btn">更新</p></button>
  </div>

@endforeach


@else
@foreach ($profiles as $profile)
<div class="top-area profile-top">
  <p class="icon"><img src="{{asset('storage/images/' . $profile->images)}}" class="icon" width="60" height="60">
  <div class="user-profile">
  <div class="profile-info">
    <label class="user-label">Name</label>
    <p class="user-name">{{$profile->username}}</p>
  </div>
  <div class="profile-info">
    <label class="user-label">Bio</label>
    <p class="user-bio">{{$profile ->bio}}</p>
  </div>
  </div>
  @if ($followTable->isEmpty())
  {!!Form::open(['url'=>'follow'])!!}
  {{ Form::hidden('userId',$userId)}}
  <button type="submit" class="follow"><p class="btn">フォローする</p></button>
  {!!Form::close()!!}
  @else
  {!!Form::open(['url'=>'unfollow'])!!}
  {{ Form::hidden('userId',$userId)}}
  <button type="submit" class="unfollow"><p class="btn">フォローをはずす</p></button>
  {!!Form::close()!!}
  @endif

</div>
@endforeach


@foreach ($posts as $post)
<div class="posts">
  <div class="posts-wrapper">
    <p class="icon"><img src="{{asset('storage/images/' . $post->images)}}" class="icon" width="60" height="60"></p>
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
@endif
@endsection
