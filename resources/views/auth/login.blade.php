@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>DAWNSNSへようこそ</h2>

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN') }}

<p class="login-link"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
