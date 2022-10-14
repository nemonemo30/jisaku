@extends('layouts.layout')
@section('content')
<div>
    <ul>
        <a href="{{ route('staffs_mypaige') }}">マイページ</a>
    </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <a href="{{ route('recruit') }}" class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header text-center">新規募集</div>
      </nav>
    </a>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">選手を探す</div>
        <div class="card-body">
          <form action="{{ route('staffs_search') }}" method="post">
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
                <option value=20~25>20～25才</option>
                <option value=26~30>26～30才</option>
                <option value=31~35>31～35才</option>
              </select>
            </div>
            <div class="form-group">
              <label for="height">身長</label>
              <select  class="form-control" id="height" name="height">
                <option disabled selected>選択してください</option>
                <option value=200~220>200~220cm</option>
                <option value=180~200>180~200cm</option>
                <option value=160~180>160~180cm</option>
                <option value=140~160>140~160cm</option>
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