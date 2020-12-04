@extends('layouts.layout')

@section('content')
  <div class="ruby">
    <div class="ruby-form">
      投稿用フォーム
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
      投稿内容一覧
      @foreach ($items as $item)
        <div class="code-items">
          <div class="code">
            {{$item->code}}
          </div>
          <div class="how">
            {{$item->how}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection