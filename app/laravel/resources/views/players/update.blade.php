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
            @foreach($players as $player)
          <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $player['name'] }}" />
            </div>
            <div class="form-group">
                <label for="position_id">ポジション</label>
                <select  class="form-control" id="position_id" name="position_id">
                    <option value="{{ $player['position_id'] }}" selected>{{ $player['position']['name'] }}</option>
                    <option value=1>PG</option>
                    <option value=2>SG</option>
                    <option value=3>SF</option>
                    <option value=4>PF</option>
                    <option value=5>C</option>
                </select>
                </div>
            <div class="form-group">
                <label for="height">身長</label>
                <input type="number" class="form-control" id="height" name="height" value="{{ $player['height'] }}">
            </div>
            <div class="form-group">
                <label for="weight">体重</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $player['weight'] }}">
            </div>
            <div class="form-group">
                <label for="age">年齢</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $player['age'] }}">
            </div>
            <div class="form-group">
                <label for="sex_id">性別</label>
                <select class="form-control" id="sex_id" name="sex_id">
                    <option value="{{ $player['sex_id'] }}" selected>{{ $player['sex']['name'] }}</option>
                    <option value=1>男性</option>
                    <option value=2>女性</option>
                </select>
            </div>
            <div class="form-group">
                <label for="video">投稿画像・動画</label>
                <input type="file" class="form-control" id="video" name="video" accept=".png" value="{{ $player['video'] }}">
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10">{{ $player['comment'] }}</textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" onClick="confirm('この内容に変更してよろしいですか')">編集</button>
            </div>
            @endforeach
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection