@extends('layouts.layout')
@section('content')
<div class="bg-image"
     style="background-image: url('https://lh5.googleusercontent.com/proxy/YqjPKEQi14-g5EA-ZVy1sIdIc6oE9eINcsN6I7TGLQYiAKW4c5ZkQ2kwYepMxABprjbG7HCP44TGlF-A0hQY1TQf=w1200-h630-p-k-no-nu');">
    <main class="py-4">
        <div class="listings my-5">
            <h2 class='text-center'>
                応募者一覧ページ
            </h2>
            <div class="row">
                @foreach($contacts as $contact)
                <div class="col-12 col-md-3 item text-center">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>
                                    <img style="height:25vh" class="img-fluid" src="{{ Storage::url($contact->video) }}">
                                </th>
                            </tr>
                            <tr>
                                <th>名前：{{ $contact['name'] }}</th>
                            </tr>
                            <tr>
                                <th>ポジション：
                                <? 
                                    if ($contact['position_id']==1){
                                        echo "PG";
                                    } else if ($contact['position_id']==2) {
                                        echo "SG";
                                    } else if ($contact['position_id']==3) {
                                        echo "SF";
                                    } else if ($contact['position_id']==4) {
                                        echo "PF";
                                    } else if ($contact['position_id']==5) {
                                        echo "C";
                                    } 
                                    ?>                                    
                                </th>
                            </tr>
                            <tr>
                                <th>身長：{{ $contact['height'] }}</th>
                            </tr>
                            <tr>
                                <th>体重：{{ $contact['weight'] }}</th>
                            </tr>
                            <tr>
                                <th>年齢：{{ $contact['age'] }}</th>
                            </tr>
                            <tr>
                                <th>性別：
                                <? 
                                    if ($contact['sex_id']==1){
                                        echo "男性";
                                    } else if ($contact['sex_id']==2) {
                                        echo "女性";
                                    } 
                                    ?>          
                                </th>
                            </tr>
                            <tr>
                                <th>コメント：{!! nl2br($contact['comment']) !!}</th>
                            </tr>
                        </table>
                        <div class="text-center">
                            <a href="{{ route('staffs_detail', ['id'=>$contact['id']]) }}">
                                <button>詳細</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
@endsection