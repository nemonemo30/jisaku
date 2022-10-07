@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>スタッフ情報</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            @foreach($posts as $post)
                            <tr>
                                <th>チーム名：</th>
                            </tr>
                            <tr>
                                <th>所在地：</th>
                            </tr>
                            <tr>
                                <th>リーグ：</th>
                            </tr>
                            <tr>
                                <th>コメント：</th>
                            </tr>
                            @endforeach
                        </table>
                        <div class="btn">
                            <a href="">
                                <button>編集</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>募集した情報</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>チーム名：</th>
                            </tr>
                            <tr>
                                <th>所在地：</th>
                            </tr>
                            <tr>
                                <th>所属リーグ：</th>
                            </tr>
                            <tr>
                                <th>コメント：</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection