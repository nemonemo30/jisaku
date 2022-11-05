@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
  <div>
    <ul>
      <li class="list-unstyled">
        <a href="{{ route('mypaige') }}">マイページ</a>
      </li>
      <li class="list-unstyled">
        <a href="{{ route('chat_list') }}">メッセージ</a>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header text-center">チームを探す</div>
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
            <form action="{{ route('search') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="hometown">都道府県</label>
                <input type="text" class="form-control" id="hometown" name="hometown"/>
              </div>
              <div class="form-group">
                <label for="position_id">ポジション<span class="text-danger">*</span></label>
                <select  class="form-control" id="position_id" name="position_id" required>
                  <option disabled selected>選択してください</option>
                  <option value=1>PG</option>
                  <option value=2>SG</option>
                  <option value=3>SF</option>
                  <option value=4>PF</option>
                  <option value=5>C</option>
                </select>
              </div>
              <div class="form-group">
                <label for="league_id">所属リーグ</label>
                <select  class="form-control" id="league_id" name="league_id">
                  <option disabled selected>選択してください</option>
                  <option value=1>B-league</option>
                  <option value=2>地域リーグ</option>
                  <option value=3>3x3</option>
                  <option value=4>アマチュアリーグ</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sex_id">性別<span class="text-danger">*</span></label>
                <select  class="form-control" id="sex_id" name="sex_id">
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
</div>
@endsection