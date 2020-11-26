<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <title>codewiki</title>
</head>
<header>
  <div class="top">
    <div class="title-top">
      <h1>Code Wiki</h1>
    </div>
    <ul class="ul-top">
      <li class="li-top">ログイン</li>
      <li class="li-top">新規登録</li>
    </ul>
  </div>
</header>
<body>

    @yield('content')

</body>
</html>