<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="images/atlas.png"></a></h1>
            <div id="head-container">
                <div id="header-menu">
                        @auth
                        <p>{{ Auth::user()->username }}さん</p>
                        <span class="triangle-btn"></span>
                        <img class="icon" src="images/{{ Auth::user()->images }}">
                        @endauth
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <ul class="acco-menu">
            <li><a href="/top">HOME</a></li>
            <li><a href="/profile">プロフィール</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
        <div id="side-bar">

            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="link"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="link"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="link"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>

    <!-- JQuery -->
    <script src="js/app.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.triangle-btn').click(function(){
                $(this).toggleClass('active');
                if($(this).hasClass('active')){
                    $('.acco-menu').addClass('active');
                }else{
                    $('.acco-menu').removeClass('active');
                }
            });
        });
    </script>
</body>
</html>
