@extends('layouts.layout')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <nav class="card mt-5" style="height:90vh">
                <div class="card-header">{{ $staffs[0]->name }}とのトーク</div>
                <div class="card-body bg-success">
                    @foreach($sends as $send)
                    @if ($send->send_id==$send_id)
                    <div class="text-right">
                        <div class="badge bg-primary text-left" style="width: 15rem;">
                            {{ $send->comment }}
                        </div>
                    </div>
                    @else
                    <div class="text-left">
                        <div class="badge bg-primary text-left" style="width: 15rem;">
                            {{ $send->comment }}
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div style="display:none" class="result text-right">
                        <div class="submit badge bg-primary text-left" style="width: 15rem;"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="text" name="comment" id="comment" class="w-75">
                    @foreach($staffs as $staff)
                    <input type="hidden" id="id" value="{{ $staff->id }}">
                    @endforeach
                    <button id="submit">送信</button>
                </div>
            </nav>
        </div>
    </div>
</div>
<script>
    $('#submit').click(function(event){
        $comment = $('#comment').val();
        $id = $('#id').val();
        // AJAX開始
        console.log($comment);
        console.log($id);
        console.log('通信開始');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/chat',
            type: 'POST',
            dataType: 'json',
            data: {
                'comment' : $comment,
                'id' : $id,
            }
        })
        .done(function(data){
            console.log('通信成功');
            $result = data;
            $('.submit').text(data);
            $('#comment').val('');
            $('.result').show();
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alert('通信に失敗しました');
            console.log("jqXHR :" + jqXHR.status);
            console.log("textStatus :" + textStatus);
            console.log("errorThrown :" + errorThrown.message);
            console.log("URL :" + url);
        });
    });
</script>
@endsection