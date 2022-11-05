<?php

class word {
    
    public function hometown(){
        if (empty($_POST["hometown"])) {
            null;
        }else {
            echo $_POST['hometown'].' ';
        }
    }
    
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
    
    public function league() {
        if (empty($_POST['league'])) {
            null;
        }else {
            if ($_POST['league']==1) {
                echo 'B-league ';
            }else if ($_POST['league']==2) {
                echo '3x3 ';
            }else if ($_POST['league']==3) {
                echo '地域リーグ ';
            }else if ($_POST['league']==4) {
                echo 'アマチュアリーグ ';
            }
        }
    }


    public function sex() {
        if (empty($_POST['sex'])) {
            null;
        }else {
            if ($_POST['sex']==1) {
                echo '男性';
            }else{
                echo '女性';
            }
        }
    }
}

$word = new word();
?>
@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://lh5.googleusercontent.com/proxy/YqjPKEQi14-g5EA-ZVy1sIdIc6oE9eINcsN6I7TGLQYiAKW4c5ZkQ2kwYepMxABprjbG7HCP44TGlF-A0hQY1TQf=w1200-h630-p-k-no-nu');">
    <div class="listings my-5">
        <div class='text-center'>
            <?
            $word->hometown(); 
            $word->position(); 
            $word->league(); 
            $word->sex(); 
            ?>
            の検索結果
        </div>
        <div class="row">
        @foreach($keywords as $keyword)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <th>チーム名：{{ $keyword->name }}</th>
                        </tr>
                        <tr>
                            <th>所属リーグ：
                                <? 
                                if ($keyword->league_id==1){
                                    echo "プロリーグ";
                                } else if ($keyword->league_id==2) {
                                    echo "地域リーグ";
                                } else if ($keyword->league_id==3) {
                                    echo "3x3";
                                } else if ($keyword->league_id==4) {
                                    echo "アマチュアリーグ";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>募集しているポジション：
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
                            <th>活動日：{!! nl2br($keyword->active) !!}</th>
                        </tr>
                        <tr>
                            <th>コメント：{!! nl2br($keyword->comment) !!}</th>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('detail', ['id'=>$keyword->id]) }}">
                            <button>募集詳細</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection