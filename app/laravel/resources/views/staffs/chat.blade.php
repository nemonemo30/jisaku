@extends('layouts.layout')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <nav class="card mt-5" style="height:90vh">
                <div class="card-header">{{ $players[0]->name }}とのトーク</div>
                <div class="card-body bg-success">
                    @foreach($sends as $send)
                    @if ($send->send_id==$send_id)
                    <div class="text-right mt-1">
                        <div class="text-white bg-primary text-left pl-1" style="border-radius:10px">
                        {{ $send->comment }}
                        </div>
                    </div>
                    @else
                    <div class="text-left mt-1">
                        <div class="text-white bg-secondary text-left pl-1" style="border-radius:10px">
                            {{ $send->comment }}
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- コメントを表示するためのもの -->
                    <div style="display:none" class="result1 text-right mt-1">
                        <div class="submit1 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result2 text-right mt-1">
                        <div class="submit2 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result3 text-right mt-1">
                        <div class="submit3 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result4 text-right mt-1">
                        <div class="submit4 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result5 text-right mt-1">
                        <div class="submit5 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result6 text-right mt-1">
                        <div class="submit6 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result7 text-right mt-1">
                        <div class="submit7 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result8 text-right mt-1">
                        <div class="submit8 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result9 text-right mt-1">
                        <div class="submit9 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                    <div style="display:none" class="result10 text-right mt-1">
                        <div class="submit10 text-white bg-primary text-left pl-1" style="border-radius:10px"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="text" name="comment" id="comment" class="w-75">
                    @foreach($players as $player)
                    <input type="hidden" id="id" value="{{ $player->id }}">
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
        console.log('通信開始');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/staffs_chat',
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
            if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='' && $('.submit5').text()!=='' && $('.submit6').text()!=='' && $('.submit7').text()!=='' && $('.submit8').text()!=='' && $('.submit9').text()!=='') {
                $('.submit10').text(data);
                $('.result10').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='' && $('.submit5').text()!=='' && $('.submit6').text()!=='' && $('.submit7').text()!=='' && $('.submit8').text()!=='') {
                $('.submit9').text(data);
                $('.result9').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='' && $('.submit5').text()!=='' && $('.submit6').text()!=='' && $('.submit7').text()!=='') {
                $('.submit8').text(data);
                $('.result8').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='' && $('.submit5').text()!=='' && $('.submit6').text()!=='') {
                $('.submit7').text(data);
                $('.result7').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='' && $('.submit5').text()!=='') {
                $('.submit6').text(data);
                $('.result6').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='' && $('.submit4').text()!=='') {
                $('.submit5').text(data);
                $('.result5').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='' && $('.submit3').text()!=='') {
                $('.submit4').text(data);
                $('.result4').show();
            }else if ($('.submit1').text()!=='' && $('.submit2').text()!=='') {
                $('.submit3').text(data);
                $('.result3').show();
            }else if ($('.submit1').text()!=='') {
                $('.submit2').text(data);
                $('.result2').show();
            }else if ($('.submit1').text()=="") {
                $('.submit1').text(data);
                $('.result1').show();
                console.log($('.submit1').text());
            }
            $('#comment').val('');
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