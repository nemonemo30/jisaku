@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
        <h2 class="text-center">管理者画面</h2>
  </div>
    <div>
        <ul>
            <li>
                <a href="{{ route('manager_mypaige') }}">プレイヤー登録者一覧</a>
            </li>
            <li>
                <a href="{{ route('manager_staff_mypaige') }}">スタッフ登録者一覧</a>
            </li>
            <li>
                <a href="{{ route('manager_recruit') }}">募集要項一覧</a>
            </li>
        </ul>
    </div>
</div>
@endsection