@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>プレイヤー情報</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        @foreach($players as $player)
                        <table class='table'>
                            <tr>
                                <th>
                                    <video>
                                        <source src="{{ $player['video'] }}" type="video/mp4" />
                                    </video>
                                </th>
                            </tr>
                            <tr>
                                <th>名前：{{ $player['name'] }}</th>
                            </tr>
                            <tr>
                                <th>ポジション：{{ $player['position']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>身長：{{ $player['height'] }}</th>
                            </tr>
                            <tr>
                                <th>体重：{{ $player['weight'] }}</th>
                            </tr>
                            <tr>
                                <th>年齢：{{ $player['age'] }}</th>
                            </tr>
                            <tr>
                                <th>性別：{{ $player['sex']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>出身：{{ $player['from'] }}</th>
                            </tr>
                            <tr>
                                <th>コメント：{{ $player['comment'] }}</th>
                            </tr>
                        </table>
                        @endforeach
                        <div class="btn">
                            <a href="{{ route('update') }}">
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
                    <div class='text-center'>応募したチーム情報</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        @foreach($players as $player)
                        <table class='table'>
                            <tr>
                                <th>チーム名：</th>
                            </tr>
                            <tr>
                                <th>所在地：</th>
                            </tr>
                            <tr>
                                <th>所属リーグ：</th>
                            </tr>
                            <tr>
                                <th>コメント：</th>
                            </tr>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection