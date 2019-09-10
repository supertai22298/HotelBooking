$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // ajax để làm form đăng ký nhận thông tin
    $("form#frm-email").submit(function(e) {
        e.preventDefault();
    });
    $("button#btn-email").click(function(e) {
        var email = $("#emailSubscription").val();
        $.ajax({
            type: "POST",
            url: "/subscribeEmail",
            data: {
                email: email
            },
            dataType: "json",
            success: function(response) {
                alert(response.msg);
                $("#emailSubscription").val("");
            }
        });
    });
    //end-------------------------------------
    $("form#frm-email").submit(function(e) {
        e.preventDefault();
    });
    $("button#btn-contact").click(function(e) {
        var name = $('input[name="name"]').val();
        var email = $('input[name="email"]').val();
        var subject = $('input[name="subject"]').val();
        var message = $('textarea[name="message"]').val();
        var is_received_news = 0;
        if($('input[name="is_received_news"]').prop('checked') == true){
            is_received_news = 1;
        }
        $.ajax({
            type: "POST",
            url: "/storeContact",
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message,
                is_received_news: is_received_news
            },

            dataType: "json",
            success: function(response) {
                $('div#div-messages').html(response.msg).removeClass('d-none').addClass(response.class);
                $('input[name="name"]').val('');
                $('input[name="email"]').val('');
                $('input[name="subject"]').val('');
                $('textarea[name="message"]').val('');
                $('input[name="is_received_news"]').prop('checked', false);
            },
            error: function(error){
                console.log(error);
            }

        });
    });
});
