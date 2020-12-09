@extends('layouts.layout')

@section('content')
  <div class="show">
    <div class="show-l">
      <div class="back-page">
        Htmlの一覧ページへは
      </div>
      <div>
        <a href="/html" class="back-url">こちらからお願いします</a>
      </div>
      <div class="other-title">
        その他一覧ページ
      </div>
      <div>
        <ul class="other-url">
          <li class="li-main"><a href="/cs" class="language-link">CSS</a></li>
          <li class="li-main"><a href="/jses" class="language-link">JavaScript</a></li>
          <li class="li-main"><a href="/ruby" class="language-link">Ruby</a></li>
          <li class="li-main"><a href="/rails" class="language-link">Ruby on Rails</a></li>
          <li class="li-main"><a href="/#" class="language-link">PHP</a></li>
          <li class="li-main"><a href="/#" class="language-link">laravel</a></li>
        </ul>
      </div>
      @if(Auth::id() == $item->user_id)
        <div class="user-edit">
          <div class="edit-title">
            投稿の編集削除
          </div>
          <a href="{{ route('htmlEdit', ['id' => $item->id]) }}" class="edit-url">編集画面</a>
        </div>
      @endif
    </div>
    <div class="show-item">
      <div class="code-title">
        要素
      </div>
      <div class="code-show">
        <div class="show-code-item" id="copyTarget">
          {{$item->code}}
        </div>
        <div>
          <input class="copy-button" type="button" id="copy" value="コピーする" onclick="onClickCopy();">
        </div>
      </div>
      <div class="how-title">
        使用方法
      </div>
      <div class="how-show">
        <div class="how-show-item">
          {{$item->how}}
        </div>
      </div>
      <div class="explanation-title">
        詳細説明
      </div>
      <div class="explanation-show">
        <div class="explanation-show-item">
          {{$item->explanation}}
        </div>
      </div>
    </div>
  </div>
@endsection