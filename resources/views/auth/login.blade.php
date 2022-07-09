@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class="welcome-title">DAWNSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p class="new-account"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
