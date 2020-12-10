@extends('layouts.layout')

@section('content')
<div class="edit">
  <div class="edit-x">
    <div class="edit-a">
      <form action="{{ route('laravelUpdate', ['id' => $item->id ]) }}" method="POST" class="edit-mein">
        @csrf
        <div class="edit-code">
          <label class="edit-code-title">メソッド,コマンド</label>
          <input type="text" name="code" value="{{$item->code}}" class="edit-code-form">
        </div>
        <div class="edit-how">
          <label class="edit-how-title">使用方法</label>
          <input type="text" name="how" value="{{$item->how}}" class="edit-how-form">
        </div>
        <div class="edit-explanation">
          <label class="edit-explanation-title">詳細説明</label>
          <textarea name="explanation" class="edit-explanation-form">{{$item->explanation}}</textarea>
        </div>
        <div class="edit-button">
          <input type="submit" value="編集内容を保存する" class="edit-button-form">
        </div>
      </form>
    </div>
    <div class="edit-b">
      <form action="{{ route('laravelDestroy', ['id' => $item->id ]) }}" method="POST">
        @csrf
        {{ method_field('delete') }}
        <input type="submit" value="この投稿を削除する" class="delete-button">
      </form>
    </div>
    <div class="edit-c">
      <div class="edit-back-link">
        <a href="{{ route('laravelShow', ['id' => $item->id]) }}">詳細画面に戻る</a>
      </div>
    </div>
  </div>
</div>
@endsection