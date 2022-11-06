@extends('layouts.layout')
@section('content')
<div class="bg-image"
style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
    <main class="py-4">
        <div class="row justify-content-around">
            <ul>
                <li class="list-unstyled">
                    <a href="{{ route('player_good') }}">いいねしてくれたチーム一覧</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ route('chat_list') }}">メッセージ</a>
                </li>
            </ul>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>プロフィール</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            @foreach($players as $player)
                            <table class='table'>
                                <tr>
                                    <th>
                                        <video class="img-fluid" controls src="{{ Storage::url($player['video']) }}"></video>
                                        <!-- <img class="img-fluid" src="{{ Storage::url($player['video']) }}"> -->
                                    </th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">名前</div>{{ $player['name'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">ポジション</div>{{ $player['position']['name'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">身長</div>{{ $player['height'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">体重</div>{{ $player['weight'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">年齢</div>{{ $player['age'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">性別</div>{{ $player['sex']['name'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">コメント</div>{!! nl2br($player['comment']) !!}</th>
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
                                    <th>
                                        <div class="text-muted">チーム名</div>{{ $contact['recruit']['name'] }}
                                    </th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">ポジション</div>
                                    <?
                                    if ($contact['recruit']['position_id']==1) {
                                        echo 'PG';
                                    } else if ($contact['recruit']['position_id']==2) {
                                        echo 'SG';
                                    } else if ($contact['recruit']['position_id']==3) {
                                        echo 'SF';
                                    } else if ($contact['recruit']['position_id']==4) {
                                        echo 'PF';
                                    } else if ($contact['recruit']['position_id']==5) {
                                        echo 'C';
                                    }
                                    ?>
                                </th>
                            </tr>
                                <tr>
                                    <th><div class="text-muted">活動日</div>{{ $contact['recruit']['active'] }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">コメント</div>{!! nl2br($contact['recruit']['comment']) !!}</th>
                                </tr>
                                <div></div>
                            </table>
                            <a onClick="return confirm('本当に削除してよろしいですか')" href="{{ route('delete', ['id'=>$contact['id']]) }}">
                                <button>削除</button>
                            </a>
                            <a href="{{ route('detail', ['id'=>$contact['recruit']['id']]) }}">
                                <button>詳細</button>
                            </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                    <table class='table'>
                        <tr>
                            <span class="text-center">現在応募中のチームはありません。</span>
                        </tr>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
@endsection