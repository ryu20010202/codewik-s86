@extends('layouts.layout')

@section('content')
  <div class="x-main">
    <div class="list-main">
      <p class="user-name">こんにちは 
        @if (Auth::check())
          <a href="/user/profile">{{Auth::user()->name}}</a>さん
        @else
          ゲストさん
        @endif
      </p>
      <ul>
        <li class="li-main"><a href="/html" class="language-link">HTML</a></li>
        <li class="li-main"><a href="/cs" class="language-link">CSS</a></li>
        <li class="li-main"><a href="/jses" class="language-link">JavaScript</a></li>
        <li class="li-main"><a href="/ruby" class="language-link">Ruby</a></li>
        <li class="li-main"><a href="/rails" class="language-link">Ruby on Rails</a></li>
        <li class="li-main"><a href="phpes" class="language-link">PHP</a></li>
        <li class="li-main"><a href="laravels" class="language-link">laravel</a></li>
      </ul>
    </div>
    <div class="page-main">
      <div class="manager-main">
        <img src="{{ asset('assets/image/user.png') }}" alt="管理人画像" class="manager-image">
        <div>
          <h1>紹介文</h1>
          <p>aaaaaa</p>
        </div>
      </div>
      <div class="main-items">
        最新投稿一覧
        <div class = "newlist">
          @if($html == null)
            <div>
              <a href="/html" class="main-url">HTML</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/html" class="main-url">HTML</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$html[0]->code}}</p>
                <a href="/html/{{$html[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$html[0]->how}}
              </div>
            </div>
          @endif
          @if($css == null)
            <div>
              <a href="/cs" class="main-url">CSS</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/cs" class="main-url">CSS</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$css[0]->code}}</p>
                <a href="/cs/{{$css[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$css[0]->how}}
              </div>
            </div>
          @endif
          @if($js == null)
            <div>
              <a href="/jses" class="main-url">Java Script</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/jses" class="main-url">Java Script</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$js[0]->code}}</p>
                <a href="/jses/{{$js[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$js[0]->how}}
              </div>
            </div>
          @endif
          @if($ruby == null)
            <div>
              <a href="/ruby" class="main-url">Ruby</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/ruby" class="main-url">Ruby</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$ruby[0]->code}}</p>
                <a href="/ruby/{{$ruby[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$ruby[0]->how}}
              </div>
            </div>
          @endif
          @if($rails == null)
            <div>
              <a href="/rails" class="main-url">Ruby on Rails</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/rails" class="main-url">Ruby on Rails</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$rails[0]->code}}</p>
                <a href="/rails/{{$rails[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$rails[0]->how}}
              </div>
            </div>
          @endif
          @if($php == null)
            <div>
              <a href="/phpes" class="main-url">PHP</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/phpes" class="main-url">PHP</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$php[0]->code}}</p>
                <a href="/phpes/{{$php[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$php[0]->how}}
              </div>
            </div>
          @endif
          @if($laravel == null)
            <div>
              <a href="/laravels" class="main-url">laravel</a>
            </div>
            <div class="main-url-title">
              投稿が存在しません
            </div>
          @else
            <div>
              <a href="/laravels" class="main-url">laravel</a>
            </div>
            <div class="code-items">
              <div class="code">
                <p class="code-item" id="copyTarget">{{$laravel[0]->code}}</p>
                <a href="/laravels/{{$laravel[0]->id}}">詳細画面</a>
              </div>
              <div class="how">
                <p class="how-item">使用方法</p>{{$laravel[0]->how}}
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection