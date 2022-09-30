@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))
  <p class="error-message">{{ $errors->first('username') }}</p>
@endif

{{ Form::label('MailAdress') }}
{{ Form::email('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
  <p class="error-message">{{ $errors->first('mail') }}</p>
@endif
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}
@if ($errors->has('password'))
  <p class="error-message">{{ $errors->first('password') }}</p>
@endif
{{ Form::label('Password confirm') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
{{ Form::submit('登録') }}

<p class="login-link"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
