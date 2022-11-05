@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">編集</div>
        <div class="card-body">
          <div class="pannel-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          @foreach($posts as $post)
          <form action="{{ route('manager_staffs_update', ['id'=>$post->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">チーム名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}">
            </div>
            <div class="form-group">
                <label for="hometown">所在地</label>
                <input type="text" class="form-control" id="hometown" name="hometown" value="{{ $post->hometown }}">
            </div>
            <div class="form-group">
                <label for="league_id">所属リーグ</label>
                <select  class="form-control" id="league_id" name="league_id">
                <option value="{{ $post->league_id }}" selected>
                <? 
                  if ($post->league_id==1){
                      echo "B-league";
                  } else if ($post->league_id==2) {
                      echo "地域リーグ";
                  } else if ($post->league_id==3) {
                      echo "3x3";
                  } else if ($post->league_id==4) {
                      echo "アマチュアリーグ";
                  }
                ?>
                </option>
                  <option value=1>B-league</option>
                  <option value=2>3x3</option>
                  <option value=3>地域リーグ</option>
                  <option value=4>アマチュアリーグ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="video">投稿画像・動画</label>
                <input type="file" class="form-control" id="video" name="video" accept=".png" value="{{ $post->video }}">
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10">{{ $post->comment }}</textarea>
            </div>
            @endforeach
            <div class="text-center">
              <button type="submit" class="btn btn-primary" onClick="return confirm('この内容で編集しますか')">登録</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection