@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="listings my-5">
        <h2 class='text-center'>
            いいねした選手一覧
        </h2>
        <div class="row">
            @foreach($goods as $good)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>名前：{{ $good->name }}</th>
                            </tr>
                            <tr>
                                <th>ポジション：
                                    <? 
                                    if ($good->position_id==1){
                                        echo "PG";
                                    } else if ($good->position_id==2) {
                                        echo "SG";
                                    } else if ($good->position_id==3) {
                                        echo "SF";
                                    } else if ($good->position_id==4) {
                                        echo "PF";
                                    } else if ($good->position_id==5) {
                                        echo "C";
                                    } 
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th>身長：{{ $good->height }}</th>
                            </tr>
                            <tr>
                                <th>体重：{{ $good->weight }}</th>
                            </tr>
                            <tr>
                                <th>年齢：{{ $good->age }}</th>
                            </tr>
                            <tr>
                                <th>性別：
                                    <? 
                                    if ($good->sex_id==1){
                                        echo "男性";
                                    } else if ($good->sex_id==2) {
                                        echo "女性";
                                    } 
                                    ?>    
                                </th>
                            </tr>
                            <tr>
                                <th>コメント：{!! nl2br($good->comment) !!}</th>
                            </tr>
                            <tr>
                                <video style="height:25vh" controls class="img-fluid" src="{{ Storage::url($good->video) }}" alt="">
                            </tr>
                        </table>
                        <div class="text-center">
                            <a href="{{ route('staffs_detail', ['id'=>$good->id]) }}">
                                <button>詳細</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection