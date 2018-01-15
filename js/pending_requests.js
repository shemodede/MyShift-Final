$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/load_pending_requests.php',
        type: 'post',
        success: function (result) {
            $('#main_pending_body').html(result);
        }
    });
    
    
    $(document).on('click', '.btn_accept', function () {
        var id = $(this).attr('id');
        alert(id);
        $.ajax({
            url: 'dashboard_scripts/join_request_details.php',
            type: 'post',
            data: {id: id},
            success: function(result){
                var returned = JSON.parse(result);
                var fn = returned.firstname;
                var ln = returned.lastname;
                var un = returned.username;
                var pw = returned.password;
                var cn = returned.cellnumber;
                var em = returned.email;
                var role = returned.role;
                var priv = returned.privilege;
                
                $('#user_id').val(id);
                $('#user_firstname').val(fn);
                $('#user_lastname').val(ln);
                $('#user_username').val(un);
                $('#user_password').val(pw);
                $('#user_cell').val(cn);
                $('#user_email').val(em);
                $('#user_role').val(role);
                $('#user_privilege').val(priv);
            }
        });
    });
    
    

    $(document).on('click', '#save_add_user', function () {
        var id = $('#user_id').val();
        var fn = $('#user_firstname').val();
        var ln = $('#user_lastname').val();
        var un = $('#user_username').val();
        var pw = $('#user_password').val();
        var cn = $('#user_cell').val();
        var em = $('#user_email').val();
        var rl = $('#user_role').val();
        var pr = $('#user_privilege').val();
        if(rl === ""){
            alert("Please provide a role for the user..");
            return;
        }

        $.ajax({
            url: 'dashboard_scripts/accept_new_user_request.php',
            type: 'post',
            data: {id: id, fn: fn, ln: ln, un: un, pw: pw, cn: cn, em: em, rl: rl, pr: pr},
            success: function (result) {
                if (result === 'success') {
                    $.ajax({
                        url: 'dashboard_scripts/load_pending_requests.php',
                        type: 'post',
                        success: function (result) {
                            $('#main_pending_body').html(result);
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', '.btn_reject', function () {
        var id = $(this).attr('id');

        $.ajax({
            url: 'dashboard_scripts/reject_join_request.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                if (result === 'success') {
                    $.ajax({
                        url: 'dashboard_scripts/load_pending_requests.php',
                        type: 'post',
                        success: function (result) {
                            $('#main_pending_body').html(result);
                        }
                    });
                }
            }
        });
    });


});