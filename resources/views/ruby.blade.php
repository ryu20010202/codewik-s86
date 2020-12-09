@extends('layouts.layout')

@section('content')
  <div class="ruby">
    <div class="ruby-form">
      投稿用フォーム
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach

      @if (Auth::check())
        <form action="/ruby" method="POST">
          @csrf
            <div class="code-form">
              <label>メソッド</label><br>
              <input type="text" name="code">
            </div>
            <div class="how-form">
              <label>使用例</label><br>
              <input type="text" name="how">
            </div>
            <div class="explanation-form">
              <label>詳細説明</label><br>
              <textarea name="explanation"></textarea>
            </div>
            <div>
              <input type="submit" value="Create">
            </div>
        </form>
      @else
        <div>
          <a href="/login">ログイン</a>してください
        </div>
      @endif
    </div>
    <div class="ruby-list">
      Ruby投稿内容一覧
      @foreach ($items as $item)
        <div class="code-items">
          <div class="code">
            <p class="code-item" id="copyTarget">{{$item->code}}</p>
            <a href="/ruby/{{$item->id}}">詳細画面</a>
          </div>
          <div class="how">
            <p class="how-item">使用方法</p>{{$item->how}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection