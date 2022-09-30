@extends('layouts.logout')

@section('content')

<div id="clear">
<div class="welcome-text">
<p>{{ $username }}さん</p>
<p>ようこそ！DAWNSNSへ！</p>
</div>
<div class="welcome-text">
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>
</div>
<p class="login-link btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
