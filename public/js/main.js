function getMsgs(){
    if(typeof last_id !== 'undefined'){

    }
    var fr_id = $('.send').data('friend_id');
        $.ajax({
            url: '/ajax/getmsgs',
            type: 'post',
            data: {
                fr_id: fr_id,
                last_id: last_id
            },
            dataType: 'json',
            success: function (res) {
                $.each(res, function () {
                    $('#chateloade').append( '<span>'+this.text+'</span>');
                    last = this.id;
                });
            }});
        }


