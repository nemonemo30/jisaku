@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">新規作成</div>
        <div class="card-body">
          <form action="{{ route('staffs_create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">チーム名</label>
                <input type="text" class="form-control" id="name" name="name"/>
            </div>
            <div class="form-group">
                <label for="hometown">所在地</label>
                <input type="text" class="form-control" id="hometown" name="hometown">
            </div>
            <div class="form-group">
                <label for="league">所属リーグ</label>
                <select  class="form-control" id="league_id" name="league_id">
                  <option disabled selected>選択してください</option>
                  <option value=1>B-league</option>
                  <option value=2>3x3</option>
                  <option value=3>地域リーグ</option>
                  <option value=4>アマチュアリーグ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10"></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">登録</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection