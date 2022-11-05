@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
    <main class="py-4">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>
                            詳細ページ
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            @foreach($details as $detail)
                            <table class='table'>
                                <tr>
                                    <th>名前：{{ $detail->name }}</th>
                                </tr>
                                <tr>
                                    <th>ポジション：
                                        <? 
                                        if ($detail->position_id==1){
                                            echo "PG";
                                        } else if ($detail->position_id==2) {
                                            echo "SG";
                                        } else if ($detail->position_id==3) {
                                            echo "SF";
                                        } else if ($detail->position_id==4) {
                                            echo "PF";
                                        } else if ($detail->position_id==5) {
                                            echo "C";
                                        } 
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>身長：{{ $detail->height }}</th>
                                </tr>
                                <tr>
                                    <th>体重：{{ $detail->weight }}</th>
                                </tr>
                                <tr>
                                    <th>年齢：{{ $detail->age }}</th>
                                </tr>
                                <tr>
                                    <th>性別：
                                        <? 
                                        if ($detail->sex_id==1){
                                            echo "男性";
                                        } else if ($detail->sex_id==2) {
                                            echo "女性";
                                        } 
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    @foreach ($emails as $email)
                                    <th>メールアドレス：
                                        <a href="mailto:{{ $email->email }}">{{ $email->email }}</a>
                                    </th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>コメント：{!! nl2br($detail->comment) !!}</th>
                                </tr>
                                <tr>
                                    <img class="img-fluid" src="{{ Storage::url($detail->video) }}">
                                </tr>
                            </table>
                            @if (empty($likes))
                            <div class="text-center">
                                <button data-id="{{ $detail->id }}" class="like">♥</button>
                            </div>
                            @else
                            <div class="text-center">
                                <button data-id="{{ $detail->id }}" class="unlike">♥</button>
                            </div>
                            @endif
                            <div class="text-center mt-1">
                                <a href="{{ route('staffs_chat', ['id'=>$detail->id]) }}">
                                    <button>チャット</button>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
<style>
    .like{
        color: #6c757d;
    }
    .unlike{
        color: #e3342f;
    }
</style>