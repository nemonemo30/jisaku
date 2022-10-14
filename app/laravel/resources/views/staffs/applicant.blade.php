@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>応募者一覧ページ</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tr>
                                <th>
                                    <video>
                                        <source src="" type="video/mp4" />
                                    </video>
                                </th>
                            </tr>
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
                                <th>コメント：</th>
                            </tr>
                        </table>
                        <div class="btn">
                            <a href="{{ route('update') }}">
                                <button>編集</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection