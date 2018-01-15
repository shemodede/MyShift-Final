$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/chat_load_contacts.php',
        type: 'post',
        success: function (result) {
            $('#contacts_tab').html(result);
        }
    });

    $.ajax({
        url: 'dashboard_scripts/chat_display_open_chats.php',
        type: 'post',
        success: function (result) {
            $('#chats_view_holder').html(result);
        }
    });

    $(document).on('click', '.user_link', function () {
        var id = $(this).attr('id');
        $.ajax({
            url: 'dashboard_scripts/chat_load_chat_view.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                $('#chat_window_title').html(result);
                $('#contac_id').val(id);
            }
        });

        $.ajax({
            url: 'dashboard_scripts/chat_load_messages.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                $('#chat-messages-body').html(result);
            }
        });
    });


    var timeOut = function () {
        $.ajax({
            url: 'dashboard_scripts/chat_display_open_chats.php',
            type: 'post',
            success: function (result) {
                $('#chats_view_holder').html(result);
            }
        });

var id = $(this).attr('id');
        $.ajax({
            url: 'dashboard_scripts/chat_load_messages.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                $('#chat-messages-body').html(result);
            }
        });

        setTimeout(timeOut, 2000);
    };

    setTimeout(timeOut, 2000);

    $(document).on('click', '.message_bar', function () {

        var id = $(this).attr('id');
        $.ajax({
            url: 'dashboard_scripts/chat_load_chat_view.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                $('#chat_window_title').html(result);
                $('#contac_id').val(id);
            }
        });


        $.ajax({
            url: 'dashboard_scripts/chat_load_messages.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                $('#chat-messages-body').html(result);
            }
        });
    });


    $('#send_text').click(function () {

        var id = $('#contac_id').val();
        var text = $('#message_text').val();
        var date = new Date();
        //alert("hey");
        if (text !== "") {
            $.ajax({
                url: 'dashboard_scripts/chat_save_message.php',
                type: 'post',
                data: {id: id, text: text, date: date},
                success: function (result) {
                    if (result === "success") {
                        //alert(result);
                        $('#message_text').val("");

                        $.ajax({
                            url: 'dashboard_scripts/chat_load_messages.php',
                            type: 'post',
                            data: {id: id},
                            success: function (result) {
                                $('#chat-messages-body').html(result);
                            }
                        });

                        $.ajax({
                            url: 'dashboard_scripts/chat_display_open_chats.php',
                            type: 'post',
                            success: function (result) {
                                $('#chats_view_holder').html(result);
                            }
                        });
                    }
                }
            });
        }
    });





});
