<?php
class keyword {
    public function position() {
        if (empty($_POST['position_id'])) {
            null;
        }else {
            if ($_POST['position_id']==1) {
                echo 'PG ';
            }else if ($_POST['position_id']==2){
                echo 'SG ';
            }else if ($_POST['position_id']==3){
                echo 'SF ';
            }else if ($_POST['position_id']==4){
                echo 'PF ';
            }else if ($_POST['position_id']==5) {
                echo 'C ';
            }
        }
    }

    public function sex() {
        if (empty($_POST['sex_id'])) {
            null;
        }else {
            if ($_POST['sex_id']==1) {
                echo '男性 ';
            }else{
                echo '女性 ';
            }
        }
    }

    public function age () {
        if (empty($_POST['age'])) {
            null;
        } else {
            if ($_POST['age']==1) {
                echo '18~25才 ';
            } else if ($_POST['age']==2) {
                echo '26~30才 ';
            } else if ($_POST['age']==3) {
                echo '31~35才 ';
            }
        }
    }

    public function height () {
        if (empty($_POST['height'])) {
            null;
        } else {
            if ($_POST['height']==200) {
                echo '200cm以上 ';
            } else if ($_POST['height']==180) {
                echo '180~200cm ';
            } else if ($_POST['height']==160) {
                echo '160~180cm ';
            } else if ($_POST['height']==140) {
                echo '140~160cm ';
            }
        }
    }
}
$keyword = new keyword();
?>

@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://lh5.googleusercontent.com/proxy/YqjPKEQi14-g5EA-ZVy1sIdIc6oE9eINcsN6I7TGLQYiAKW4c5ZkQ2kwYepMxABprjbG7HCP44TGlF-A0hQY1TQf=w1200-h630-p-k-no-nu');">
    <div class="listings my-5">
        <div class='text-center'>
            <?
            $keyword->position(); 
            $keyword->sex(); 
            $keyword->age();
            $keyword->height();
            ?>
            の検索結果
        </div>
        <div class="row">
            @foreach($keywords as $keyword)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <th>名前：{{ $keyword->name }}</th>
                        </tr>
                        <tr>
                            <th>ポジション：
                                <? 
                                if ($keyword->position_id==1){
                                    echo "PG";
                                } else if ($keyword->position_id==2) {
                                    echo "SG";
                                } else if ($keyword->position_id==3) {
                                    echo "SF";
                                } else if ($keyword->position_id==4) {
                                    echo "PF";
                                } else if ($keyword->position_id==5) {
                                    echo "C";
                                } 
                                ?>                                    
                            </th>
                        </tr>
                        <tr>
                            <th>年齢：{{ $keyword->age }}</th>
                        </tr>
                        <tr>
                            <th>コメント：{!! nl2br($keyword->comment) !!}</th>
                        </tr>
                        <tr>
                            <img style="height:25vh" class="img-fluid" src="{{ Storage::url($keyword->video) }}">
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('staffs_detail', ['id'=>$keyword->id]) }}">
                            <button>詳細</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
    