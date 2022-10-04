@extends('layouts.layout')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>詳細ページ</div>
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
                        <div class="text-center">
                                <a href="{{ route('apply') }}">
                                    <button>応募する</button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection