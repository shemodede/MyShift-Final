$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/load_team_members.php',
        type: 'post',
        success: function (result) {
            $('#main_team_body').html(result);
        }
    });

    $(document).on('click', '.btn_manage', function () {
        var id = $(this).attr('id');
        $('#save_user_changes').text("Save Changes");
        $('#op_type').val("edit");
        $.ajax({
            url: 'dashboard_scripts/load_user_info.php',
            type: 'post',
            data: {id: id},
            success: function (result) {
                var returned = JSON.parse(result);
                var fn = returned.firstname;
                var ln = returned.lastname;
                var un = returned.username;
                var cn = returned.cellnumber;
                var em = returned.email;
                var role = returned.role;
                var priv = returned.privilege;

                $('#user_id').val(id);
                $('#user_firstname').val(fn);
                $('#user_lastname').val(ln);
                $('#user_username').val(un);
                $('#user_cell').val(cn);
                $('#user_email').val(em);
                $('#user_role').val(role);
                $('#user_privilege').val(priv);
            }
        });
    });

    $('#add_member').click(function () {
        $('#op_type').val("add");
        $('#save_user_changes').text("Add User");

    });

    $(document).on('click', '#save_user_changes', function () {


        if ($('#op_type').val() === 'edit') {
            var fn = $('#user_firstname').val();
            var ln = $('#user_lastname').val();
            var un = $('#user_username').val();
            var cn = $('#user_cell').val();
            var em = $('#user_email').val();
            var role = $('#user_role').val();
            var priv = $('#user_privilege').val();
            var id = $('#user_id').val();


            $.ajax({
                url: 'dashboard_scripts/save_user_changes.php',
                type: 'post',
                data: {id: id, fn: fn, ln: ln, un: un, cn: cn, em: em, role: role, priv: priv},
                success: function (result) {
                    $('#defaultModal').toggle();
                    if (result === "success") {
                        $.ajax({
                            url: 'dashboard_scripts/load_team_members.php',
                            type: 'post',
                            success: function (result) {
                                $('#main_team_body').html(result);
                            }
                        });
                    }
                }
            });
        } else if ($('#op_type').val() === 'add') {


            var fn = $('#user_firstname').val();
            var ln = $('#user_lastname').val();
            var un = $('#user_username').val();
            var cn = $('#user_cell').val();
            var em = $('#user_email').val();
            var role = $('#user_role').val();
            var priv = $('#user_privilege').val();


            $.ajax({
                url: 'dashboard_scripts/team_create_new_user.php',
                type: 'post',
                data: {fn: fn, ln: ln, un: un, cn: cn, em: em, role: role, priv: priv},
                success: function (result) {
                    if (result === 'success') {


                        $.ajax({
                            url: 'dashboard_scripts/load_team_members.php',
                            type: 'post',
                            success: function (result) {
                                $('#main_team_body').html(result);
                            }
                        });


                        $('#defaultModal').modal('toggle');
                        $(".modal-backdrop").remove();

                        $('#user_firstname').val("")
                        $('#user_lastname').val("");
                        $('#user_username').val("");
                        $('#user_cell').val("");
                        $('#user_email').val("");
                        $('#user_role').val("");
                        $('#user_privilege').val("select");

                    } else {
                        alert("An error occured. Please contact support.");
                    }
                }
            });
        }




    });




    $(document).on('click', '.btn_remove', function () {

        $.ajax({
            url: 'dashboard_scripts/remove_team_member.php',
            type: 'post',
            success: function (result) {
                if (result === 'success') {

                }
            }
        });

    });
});