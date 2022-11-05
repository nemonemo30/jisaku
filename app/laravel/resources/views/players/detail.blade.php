@extends('layouts.layout')
@section('content')
<div class="bg-image"
    style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20201223/pngtree-basketball-texture-clean-background-image_513513.jpg');">
    <main class="py-4">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>詳細ページ</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            @foreach($details as $detail)
                            <table class='table'>
                                <tr>
                                    <th>
                                        <img class="img-fluid" src="{{ Storage::url($detail->video) }}">
                                    </th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">チーム名</div>{{ $detail->name }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">所在地</div>{{ $detail->hometown }}</th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">所属リーグ</div>
                                        <? 
                                        if ($detail->league_id==1){
                                            echo "プロリーグ";
                                        } else if ($detail->league_id==2) {
                                            echo "地域リーグ";
                                        } else if ($detail->league_id==3) {
                                            echo "3x3";
                                        } else if ($detail->league_id==4) {
                                            echo "アマチュアリーグ";
                                        }
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th><div class="text-muted">コメント</div>{!! nl2br($detail->comment) !!}</th>
                                </tr>
                            </table>
                            <div class="text-center">
                                <a href="{{ route('apply', ['id'=>$detail->id]) }}">
                                    <button>応募する</button>
                                </a>
                                @foreach($staffs as $staff)
                                <a href="{{ route('chat', ['id'=>$staff->id]) }}">
                                @endforeach
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