@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://lh5.googleusercontent.com/proxy/YqjPKEQi14-g5EA-ZVy1sIdIc6oE9eINcsN6I7TGLQYiAKW4c5ZkQ2kwYepMxABprjbG7HCP44TGlF-A0hQY1TQf=w1200-h630-p-k-no-nu');">
    <div class="listings my-5">
        <div class="row">
        @foreach($recruits as $recruit)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <th><divチーム名</div>{{ $recruit->name }}</th>
                        </tr>
                        <tr>
                            <th><div所属リーグ</div>
                                <? 
                                if ($recruit->sex_id==1){
                                    echo "男性";
                                } else if ($recruit->sex_id==2) {
                                    echo "女性";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th><div>募集しているポジション</div>
                                <? 
                                if ($recruit->position_id==1){
                                    echo "PG";
                                } else if ($recruit->position_id==2) {
                                    echo "SG";
                                } else if ($recruit->position_id==3) {
                                    echo "SF";
                                } else if ($recruit->position_id==4) {
                                    echo "PF";
                                } else if ($recruit->position_id==5) {
                                    echo "C";
                                } 
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th><div活動日</div>{!! nl2br($recruit->active) !!}</th>
                        </tr>
                        <tr>
                            <th><divコメント</div>{!! nl2br($recruit->comment) !!}</th>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('apply', ['id'=>$recruit->id]) }}">
                            <button>応募する</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection