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
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($posts as $post)
            <div class="form-group">
                <label for="name">チーム名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $post['name'] }}">
            </div>
            <div class="form-group">
                <label for="hometown">所在地</label>
                <input type="text" class="form-control" id="hometown" name="hometown" value="{{ $post['hometown'] }}">
            </div>
            <div class="form-group">
                <label for="league_id">所属リーグ</label>
                <select  class="form-control" id="league_id" name="league_id">
                <option value="{{ $post['league_id'] }}" selected>{{ $post['league']['name'] }}</option>
                  <option value=1>プロリーグ</option>
                  <option value=2>3x3</option>
                  <option value=3>地域リーグ</option>
                  <option value=4>アマチュアリーグ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="video">投稿画像・動画</label>
                <input type="file" class="form-control" id="video" name="video" accept=".png">
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10">{{ $post['comment'] }}</textarea>
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