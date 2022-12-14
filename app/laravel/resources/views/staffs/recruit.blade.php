@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header text-center">新規募集フォーム</div>
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
          <form action="{{ route('recruit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">あなたのチーム名</label>
                <input type="text" class="form-control" id="name" name="name"/>
            </div>
            <div class="form-group">
                <label for="position_id">募集したいポジション</label>
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
                <label for="sex_id">募集したい性別</label>
                    <select  class="form-control" id="sex_id" name="sex_id">
                    <option disabled selected>選択してください</option>
                    <option value=1>男性</option>
                    <option value=2>女性</option>
                </select>
            </div>
            <div class="form-group">
                <label for="active">活動日：時間</label>
                <input type="text" class="form-control" id="active" name="active" placeholder="水曜、土曜、日曜の18~21" value=""/>
            </div>
            <div class="form-group">
                <label for="comment">メッセージ</label>
                <textarea name="comment" id="comment" class="form-control" cols="35" rows="10" placeholder="過去の実績など"></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" onClick="return confirm('この内容で募集しますか')">募集</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection