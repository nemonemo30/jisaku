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
        if (empty($_POST['sex'])) {
            null;
        }else {
            if ($_POST['sex']==1) {
                echo '男性 ';
            }else{
                echo '女性 ';
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
                        $keyword->position(); 
                        $keyword->sex(); 
                        echo $_POST['age']??null;
                        echo ' ';
                        echo $_POST['height']??null;
                        ?>
                        の検索結果
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>名前：</th>
                            </tr>
                            <tr>
                                <th>ポジション：</th>
                            </tr>
                            <tr>
                                <th>身長：</th>
                            </tr>
                            <tr>
                                <th>体重：</th>
                            </tr>
                            <tr>
                                <th>年齢：</th>
                            </tr>
                            <tr>
                                <th>性別：</th>
                            </tr>
                            <tr>
                                <th>出身：</th>
                            </tr>
                            <tr>
                                <th>コメント：</th>
                            </tr>
                            <tr>
                                <th class="text-center">動画</th>
                                <img src="" alt="">
                            </tr>
                        </table>
                        <div class="text-center">
                                <a href="{{ route('staffs_detail') }}">
                                    <button>詳細</button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
