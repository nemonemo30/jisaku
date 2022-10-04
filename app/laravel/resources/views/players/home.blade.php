@extends('layouts.layout')
@section('content')
<div>
    <ul>
        <a href="{{ route('mypaige') }}">マイページ</a>
    </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">チームを探す</div>
        <div class="card-body">
          <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="hometown">都道府県</label>
              <input type="text" class="form-control" id="hometown" name="hometown"/>
            </div>
            <div class="form-group">
              <label for="position_id">ポジション</label>
              <select  class="form-control" id="position_id" name="position_id">
                <option disabled selected>選択してください</option>
                <option value=1>PG</option>
                <option value=2>SG</option>
                <option value=3>SF</option>
                <option value=4>PF</option>
                <option value=5>C</option>
              </select>
            </div>
            <div class="form-group">
              <label for="league">所属リーグ</label>
              <select  class="form-control" id="league" name="league">
                <option disabled selected>選択してください</option>
                <option value=1>B-league</option>
                <option value=2>3x3</option>
                <option value=3>地域リーグ</option>
                <option value=4>アマチュアリーグ</option>
              </select>
            </div>
            <div class="form-group">
              <label for="sex">性別</label>
              <select  class="form-control" id="sex" name="sex">
                <option disabled selected>選択してください</option>
                <option value=1>男性</option>
                <option value=2>女性</option>
              </select>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">検索</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection