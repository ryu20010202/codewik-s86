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
        <li class="li-main"><a href="#" class="language-link">JavaScript</a></li>
        <li class="li-main"><a href="/ruby" class="language-link">Ruby</a></li>
        <li class="li-main"><a href="#" class="language-link">Ruby on Rails</a></li>
        <li class="li-main"><a href="#" class="language-link">PHP</a></li>
        <li class="li-main"><a href="#" class="language-link">laravel</a></li>
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
          @foreach ($items as $item)
            <div class="new-items">
              <div class="new-count">
                <?php
                  $count += 1;
                  print($count);
                ?>
              </div>
              <div class="new-item">
                {{$item}}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection