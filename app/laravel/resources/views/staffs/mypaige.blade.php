@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <ul>
            <li class="list-unstyled">
                <a href="{{ route('good') }}">いいね一覧</a>
            </li>
            <li class="list-unstyled">
                <a href="{{ route('applicant') }}">応募者一覧</a>
            </li>
        </ul>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>スタッフ情報</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            @foreach($posts as $post)
                            <tr>
                                <th>チーム名：{{ $post['name'] }}</th>
                            </tr>
                            <tr>
                                <th>所在地：{{ $post['hometown'] }}</th>
                            </tr>
                            <tr>
                                <th>リーグ：{{ $post['league']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>コメント：{{ $post['comment'] }}</th>
                            </tr>
                            @endforeach
                        </table>
                        <div class="btn">
                            <a href="{{ route('staffs_update') }}">
                                <button>編集</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>募集中の内容</div>
                </div>
                @if(!empty($recruits))
                @foreach($recruits as $recruit)
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                @foreach($posts as $post)
                                <th>チーム名：{{ $post['name'] }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>募集中のポジション：{{ $recruit['position']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>募集中の性別：{{ $recruit['sex']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>活動日-時間：{{ $recruit['active'] }}</th>
                            </tr>
                            <tr>
                                <th>コメント：{{ $recruit['comment'] }}</th>
                            </tr>
                            <div></div>
                        </table>            
                            <a onClick="confirm('本当に削除してよろしいですか')" href="{{ route('delete', ['id' => $recruit['id']]) }}">
                                <button>削除</button>
                            </a>
                    </div>
                </div>
                @endforeach
                @else
                <table class='table'>
                    <tr>
                        <a class="text-center" href="{{ route('recruit') }}">新しく新規募集を作成しますか？</a>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection