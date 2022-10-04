@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header text-center">応募フォーム</div>
        <div class="card-body">
            @foreach($players as $player)
          <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $player['name'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="position_id">ポジション</label>
                <input type="text" class="form-control" id="position_id" name="position_id" value="{{ $player['position']['name'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="height">身長</label>
                <input type="number" class="form-control" id="height" name="height" value="{{ $player['height'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="weight">体重</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $player['weight'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="age">年齢</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $player['age'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="sex_id">性別</label>
                <input type="text" class="form-control" id="sex_id" name="sex_id" value="{{ $player['sex']['name'] }}" disabled/>
            </div>
            <div class="form-group">
                <label for="comment">メッセージ</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10"></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" onClick="confirm('この内容で応募してよろしいですか')">応募</button>
            </div>
            @endforeach
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection