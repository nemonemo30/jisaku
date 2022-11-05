@extends('layouts.layout')
@section('content')
<div class="bg-image"
    style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
    <div class="card">
        <div class="card-header">
            <div class='text-center'>プロフィール</div>
        </div>    
        <div class="listings my-5">
            <div class="row">
                @foreach($players as $player)
                <div class="col-12 col-md-3 item text-center">
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <tr>
                                    <th>
                                        <img class="img-fluid" src="{{ Storage::url($player->video) }}">
                                    </th>
                                </tr>
                                <tr>
                                    <th>名前：{{ $player->name }}</th>
                                </tr>
                                <tr>
                                    <th>ポジション：<?
                                    if ($player->position_id==1) {
                                        echo 'PG';
                                    } else if ($player->position_id==2) {
                                        echo 'SG';
                                    } else if ($player->position_id==3) {
                                        echo 'SF';
                                    } else if ($player->position_id==4) {
                                        echo 'PF';
                                    } else if ($player->position_id==5) {
                                        echo 'C';
                                    }
                                    ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>身長：{{ $player->height }}</th>
                                </tr>
                                <tr>
                                    <th>体重：{{ $player->weight }}</th>
                                </tr>
                                <tr>
                                    <th>年齢：{{ $player->age }}</th>
                                </tr>
                                <tr>
                                    <th>性別：
                                        <? 
                                        if ($player->sex_id==1){
                                            echo "男性";
                                        } else if ($player->sex_id==2) {
                                            echo "女性";
                                        } 
                                        ?>    
                                    </th>
                                </tr>
                                <tr>
                                    <th>コメント：{{ $player->comment }}</th>
                                </tr>
                            </table>
                            <div class="btn">
                                <a href="{{ route('manager_update', ['id'=>$player->id]) }}">
                                    <button>編集</button>
                                </a>
                                <a onClick="return confirm('本当に削除しますか')" href="{{ route('manager_delete', ['id'=>$player->id]) }}">
                                    <button>削除</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection