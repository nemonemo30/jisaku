@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div class='text-center'>スタッフ登録者一覧</div>
    </div>    
    <div class="listings my-5">
        <div class="row">
            @foreach($staffs as $staff)
            <div class="col-12 col-md-3 item text-center">
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>チーム名：{{ $staff->name }}</th>
                            </tr>
                            <tr>
                                <th>所在地：{{ $staff->hometown }}</th>
                            </tr>
                            <tr>
                                <th>リーグ：
                                    <? 
                                    if ($staff->league_id==1){
                                        echo "B-league";
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
                                <th>コメント：{{ $staff->comment }}</th>
                            </tr>
                        </table>
                        <div class="btn">
                            <a href="{{ route('manager_staffs_update', ['id'=>$staff->id]) }}">
                                <button>編集</button>
                            </a>
                            <a onClick="return confirm('本当に削除しますか')" href="{{ route('manager_staffs_delete', ['id'=>$staff->id]) }}">
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
@endsection