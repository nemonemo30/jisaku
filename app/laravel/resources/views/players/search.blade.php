<?php

class keyword {
    
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

$keyword = new keyword();
?>
@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>
                        <? 
                        $keyword->hometown(); 
                        $keyword->position(); 
                        $keyword->league(); 
                        $keyword->sex(); 
                        ?>
                        の検索結果
                    </div>
                </div>
                <div class="card-body">
                    @foreach($keywords as $keyword)
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>チーム名：</th>
                            </tr>
                            <tr>
                                <th>募集しているポジション：</th>
                            </tr>
                            <tr>
                                <th>活動日：</th>
                            </tr>
                            <tr>
                                <th>コメント：</th>
                            </tr>
                        </table>
                        <div class="text-center">
                            <a href="{{ route('detail') }}">
                                <button>詳細</button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
