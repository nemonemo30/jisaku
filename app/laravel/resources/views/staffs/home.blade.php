
@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
  <div>
    <ul>
      <a href="{{ route('staffs_mypaige') }}">マイページ</a><br>
      <a href="{{ route('applicant') }}">応募者一覧</a><br>
      <a href="{{ route('good') }}">いいね一覧</a><br>
      <a href="{{ route('recruit') }}">新規募集</a><br>
      <a href="{{ route('staffs_chat_list') }}">メッセージ</a>
    </ul>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">選手を探す</div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          <div class="card-body">
            <form action="{{ route('staffs_search') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="position_id">ポジション</label>
                <select  class="form-control" id="position_id" name="position_id" >
                  <option disabled selected>選択してください</option>
                  <option value=1>PG</option>
                  <option value=2>SG</option>
                  <option value=3>SF</option>
                  <option value=4>PF</option>
                  <option value=5>C</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sex_id">性別<span class="text-danger">*</span></label>
                <select  class="form-control" id="sex_id" name="sex_id" >
                  <option disabled selected>選択してください</option>
                  <option value=1>男性</option>
                  <option value=2>女性</option>
                </select>
              </div>
              <div class="form-group">
                <label for="age">年齢</label>
                <select  class="form-control" id="age" name="age">
                  <option disabled selected>選択してください</option>
                  <option value=1>18～25才</option>
                  <option value=2>26～30才</option>
                  <option value=3>31～35才</option>
                </select>
              </div>
              <div class="form-group">
                <label for="height">身長</label>
                <select  class="form-control" id="height" name="height">
                  <option disabled selected>選択してください</option>
                  <option value=200>200cm以上</option>
                  <option value=180>180cm以上</option>
                  <option value=160>160cm以上</option>
                  <option value=140>140cm以上</option>
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
</div>
@endsection