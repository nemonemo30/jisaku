@extends('layouts.layout')
@section('content')
<div>
    <ul>
        <a href="{{ route('staffs_mypaige') }}">マイページ</a>
    </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">選手を探す</div>
        <div class="card-body">
          <form action="" method="post">
            @csrf
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
              <label for="sex">性別</label>
              <select  class="form-control" id="sex" name="sex">
                <option disabled selected>選択してください</option>
                <option value=1>男性</option>
                <option value=2>女性</option>
              </select>
            </div>
            <div class="form-group">
              <label for="age">年齢</label>
              <select  class="form-control" id="age" name="age">
                <option disabled selected>選択してください</option>
                <option value=24>25才未満</option>
                <option value=29>30才未満</option>
                <option value=30>30才以上</option>
              </select>
            </div>
            <div class="form-group">
              <label for="height">身長</label>
              <select  class="form-control" id="height" name="height">
                <option disabled selected>選択してください</option>
                <option value=200>200~220cm</option>
                <option value=180>180~200cm</option>
                <option value=160>160~180cm</option>
                <option value=140>140~160cm</option>
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