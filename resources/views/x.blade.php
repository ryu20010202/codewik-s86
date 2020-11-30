@extends('layouts.layout')

@section('content')
  <div class="x-main">
    <div class="list-main">
      <p class="user-name">こんにちは userさん</p>
      <ul>
        <li class="li-main"><a href="#" class="language-link">HTML</a></li>
        <li class="li-main"><a href="#" class="language-link">CSS</a></li>
        <li class="li-main"><a href="#" class="language-link">JavaScript</a></li>
        <li class="li-main"><a href="#" class="language-link">Ruby</a></li>
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
        {{ $user_name }}
        <div class="new-items">
          <div class="new-count">
            <?php
              $count = 0;

              while ($count < 10){
                $count += 1 ;
                print($count);
                print("<br/>");
              }
            ?>
          </div>
          <div class="new-item">
            <?php
              foreach ($items as $item) {
                print($item);
                print("<br/>");
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection