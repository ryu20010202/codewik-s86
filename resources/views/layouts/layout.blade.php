<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <script src="{{ asset('assets/js/copy.js') }}"></script>
    <title>codewiki</title>
</head>
<header>
  <div class="top">
    <div class="title-top">
      <h1><a href="/" class="main-title">Code Wiki</a></h1>
    </div>
    @if ( Auth::check() )
      <ul class="ul-top">
        <li class="li-top"><a href="/logout" class="user-link">ログアウト</a></li>
        <li class="li-top"><a href="/user/profile" class="user-link">{{Auth::user()->name}}</a></li>
      </ul>
    @else
      <ul class="ul-top">
        <li class="li-top"><a href="/login" class="user-link">ログイン</a></li>
        <li class="li-top"><a href="/register" class="user-link">新規登録</a></li>
      </ul>
    @endif
  </div>
</header>
<body>

    @yield('content')

</body>
<footer>
  <div class="bottom">
    <div class="intermediate-bottom">
      <div class="inquiry-bottom">
        問合せ用メールアドレス <a href="mailto:ryu27017@gmail.com">ryu27017@gmail.com</a>
      </div>
      <div class="sns-bottom">
        twitterアカウント <a href="https://twitter.com/Ryut03251161">@Ryut03251161</a>
      </div>
    </div>
  </div>
</footer>
</html>