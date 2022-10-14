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
                    <div class='text-center'>応募中の内容</div>
                </div>
                @if(!empty($contacts))
                @foreach($contacts as $contact)
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>チーム名：{{ $contact['recruit']['name'] }}</th>
                            </tr>
                            <tr>
                                <th>ポジション：{{ $contact['recruit']['position_id'] }}</th>
                            </tr>
                            <tr>
                                <th>活動日：{{ $contact['recruit']['active'] }}</th>
                            </tr>
                            <tr>
                                <th>コメント：{{ $contact['recruit']['comment'] }}</th>
                            </tr>
                            <div></div>
                        </table>            
                            <a onClick="confirm('本当に削除してよろしいですか')" href="">
                                <button>削除</button>
                            </a>
                    </div>
                </div>
                @endforeach
                @else
                <table class='table'>
                    <tr>
                        <a class="text-center" href="">？</a>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection