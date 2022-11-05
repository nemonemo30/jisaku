$(function() {

    $('.like').click(function(){
        $player_id = $('.like').data('id');
        // $player_id = $('.like').val();
        console.log($player_id);
        // Ajax通信を開始
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/like',
            type: 'POST',
            dataType: 'json',
            // dataTypeについて調べる
            data: {
                'player_id' : $player_id,
            },
            // user_id, player_idなど必要なデータをlaravelに送る
        })
        .done(function(data) {
            // 通信成功時の処理を記述//
            $('.like').toggleClass('text-danger');
            console.log(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // 通信失敗時の処理を記述
            alert('更新に失敗しました');
            console.log("jqXHR :" + jqXHR.status);
            console.log("textStatus :" + textStatus);
            console.log("errorThrown :" + errorThrown.message);
            console.log("URL :" + url);
        });
    });
    
    $('.unlike').click(function(event){
        $player_id = $('.unlike').data('id');
        // $player_id = $('.unlike').val();
        console.log($player_id);
        // Ajax通信を開始
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/unlike',
            type: 'POST',
            dataType: 'json',
            // dataTypeについて調べる
            data: {
                'player_id' : $player_id,
            },
            // user_id, player_idなど必要なデータをlaravelに送る
        })
        .done(function(data) {
            // 通信成功時の処理を記述//
            $('.unlike').toggleClass('text-muted');
            console.log(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // 通信失敗時の処理を記述
            alert('更新に失敗しました');
            console.log("jqXHR :" + jqXHR.status);
            console.log("textStatus :" + textStatus);
            console.log("errorThrown :" + errorThrown.message);
            console.log("URL :" + url);
        });
    });

});