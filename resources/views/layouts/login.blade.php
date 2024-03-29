<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>DawnSNS</title>
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="{{asset('images/dawn_webicon.png')}}" sizes="16x16" type="image/png" />
    <link rel="icon" href="{{asset('images/dawn_webicon.png')}}" sizes="32x32" type="image/png" />
    <link rel="icon" href="{{asset('images/dawn_webicon.png')}}" sizes="48x48" type="image/png" />
    <link rel="icon" href="{{asset('images/dawn_webicon.png')}}" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src={{asset('images/main_logo.png')}} alt=""></a></h1>
            <div id="DawnMenu">
                <div class="Drop-wrapper">
                    <p id="Dropdown"> {{ Auth::user()->username }}さん</p>
                    <img src="{{asset('storage/images/' . Auth::user()->images) }}" class="icon" width="60" height="60">
                </div>
                <ul class="DropdownMenu">
                    <li><a href="/top">HOME</a></li>
                    <li>
                        <a href="/profile/{{Auth::user()->id}}">
                                            プロフィール編集
                                        </a>
                    </li>
                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p> {{ Auth::user()->username }}さんの</p>
                <div class="follow-count">
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <p class="followlist-btn"><a href="/follow-list" class="btn">フォローリスト</a></p>
                <div class="follow-count">
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="followlist-btn"><a href="/follower-list" class="btn">フォロワーリスト</a></p>
            </div>
            <p class="user-search"><a href="/search" class="btn">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
