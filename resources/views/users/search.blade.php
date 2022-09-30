@extends('layouts.login')

@section('content')
<div class="top-area">
  {!! Form::open(['url'=>'/search']) !!}
  <div class="search-wrap">
  {{ Form::text('search',null,['class' => 'search','placeholder' => 'ユーザー名']) }}
  <button type="submit" class="btn search-btn"><img src={{asset('images/search.png')}} alt=""></button>
  {!! Form::close() !!}
  @if (isset($keyword))
    <p class="search-word">検索ワード:{{$keyword}}</p>
  @endif
  </div>
</div>
  @foreach ($searchLists as $search)
    <div class="user-wrapper">
      <p class="icon">
      <a href="profile/{{ $search->user_id }}"><img src={{asset('storage/images/' . $search->images)}} class="icon" width="60" height="60"></a>
      </p>
      <div class="user-info">
        <p class="user-name">{{$search->username}}</p>
        <div class="follow-btn">
          @if (!$follows->contains('follower_id', $search->id))
            {!!Form::open(['url'=>'follow'])!!}
            {{ Form::hidden('userId',$search->user_id)}}
            <button type="submit" class="follow"><p class="btn">フォローする</p></button>
            {!!Form::close()!!}
            @else
            {!!Form::open(['url'=>'unfollow'])!!}
            {{ Form::hidden('userId',$search->user_id)}}
            <button type="submit" class="unfollow"><p class="btn">フォローをはずす</p></button>
            {!!Form::close()!!}
          @endif
        </div>
      </div>
    </div>
  @endforeach
@endsection
