@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                @foreach($recruits as $recruit)
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>チーム名：{{ $recruit->name }}</th>
                            </tr>
                            <tr>
                                <th>募集中のポジション：
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
                                <th>募集中の性別：
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
                                <th>活動日-時間：{{ $recruit->active }}</th>
                            </tr>
                            <tr>
                                <th>コメント：{{ $recruit->comment }}</th>
                            </tr>
                            <div></div>
                        </table>            
                        <a onClick="return confirm('本当に削除してよろしいですか')" href="{{ route('manager_staffs_delete', ['id' => $recruit->id]) }}">
                            <button>削除</button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection