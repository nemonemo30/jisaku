@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://lh5.googleusercontent.com/proxy/YqjPKEQi14-g5EA-ZVy1sIdIc6oE9eINcsN6I7TGLQYiAKW4c5ZkQ2kwYepMxABprjbG7HCP44TGlF-A0hQY1TQf=w1200-h630-p-k-no-nu');">
    <div class="listings my-5">
        @if(count($goods)!=0)
        <div class="row">
            @foreach($staffs as $staff)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <th><div class="text-muted">チーム名</div>{{ $staff->name }}</th>
                        </tr>
                        <tr>
                            <th><div class="text-muted">所在地</div>{{ $staff->hometown }}</th>
                        </tr>
                    <tr>
                        <th><div class="text-muted">所属リーグ</div>
                            <?
                            if ($staff->league_id==1){
                                echo "プロリーグ";
                            } else if ($staff->league_id==2) {
                                echo "地域リーグ";
                            } else if ($staff->league_id==3) {
                                echo "3x3";
                            } else if ($staff->league_id==4) {
                                echo "アマチュアリーグ";
                            }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th><div class="text-muted">コメント</div>{!! nl2br($staff->comment) !!}</th>
                    </tr>
                </table>
                <div class="text-center">
                    <a href="{{ route('good_detail', ['id'=>$staff->id]) }}">
                        <button>詳細</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        @else
        <h2 class="text-center">まだいいねしてくれたチームはありません</h2>
        @endif
    </div>
</div>
@endsection