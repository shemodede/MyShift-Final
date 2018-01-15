$(document).ready(function () {
    $('#team_div_click').click(function () {
        window.location.href('http://localhost/MyShiftNew/main/team.php');
    });

    $.ajax({
        url: 'dashboard_scripts/todo_list_loader.php',
        type: 'post',
        success: function (result) {
            $('#todo_list_body').html(result);
        }
    });

    $(document).on('change', '.checkbox', function () {
        var id = $(this).attr('id');
        var state = "";
        if (this.checked) {
            state = "completed";
        } else {
            var state = "not";
        }
        $.ajax({
            url: 'dashboard_scripts/todo_list_change_item.php',
            data: {id: id, state: state},
            type: 'post',
            success: function () {
                $.ajax({
                    url: 'dashboard_scripts/todo_list_loader.php',
                    type: 'post',
                    success: function (result) {
                        $('#todo_list_body').html(result);
                    }
                });
            }
        });
    });

    $(document).on('click', '.deleted_item', function () {
        var id = $(this).attr('id');
//        alert(id);
        $.ajax({
            url: 'dashboard_scripts/index_page_todo.php',
            type: 'post',
            data: {id: id},
            success: function(result){
                $('#todo_list_body').html(result);
            }
        });
    });


    $('#todo-list-item').keyup(function () {

        if ($('#todo-list-item').val().length > 2) {
            $('#add_id').removeAttr('disabled');
        }
    });

    $('#add_id').click(function () {
        var item_title = $('#todo-list-item').val();
        //alert(item_title);
        $.ajax({
            url: 'dashboard_scripts/save_todo_item.php',
            type: 'post',
            data: {item_title: item_title},
            success: function (result) {
                var text = result;
                if (text === 'success') {
                    $.ajax({
                        url: 'dashboard_scripts/todo_list_loader.php',
                        type: 'post',
                        success: function (result) {
                            $('#todo_list_body').html(result);
                            $('#todo-list-item').val("");
                        }
                    });
                }
            }
        });

    });

    $.ajax({
        url: 'dashboard_scripts/load_roles.php',
        type: 'post',
        success: function (result) {
            $('#roles_select').html(result);
        }
    });



    $.ajax({
        url: 'dashboard_scripts/load_team_contacts.php',
        type: 'post',
        success: function (result) {
            $('#contacts_table').html(result);
        }
    });


    $('select[name="filter_roles"]').change(function () {
        if ($(this).val() === "[Select Role]" || $(this).val() === "All") {
            $.ajax({
                url: 'dashboard_scripts/load_team_contacts.php',
                type: 'post',
                success: function (result) {
                    $('#contacts_table').html(result);
                }
            });
        } else {
            var filter = $(this).val();
            $.ajax({
                url: 'dashboard_scripts/load_team_filter_roles.php',
                type: 'post',
                data: {filter: filter},
                success: function (result) {
                    $('#contacts_table').html(result);
                }
            });
        }
    });

    $('.team-table-div').css('margin-top', '10px');




});