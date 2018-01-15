$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/load_profile.php',
        type: 'post',
        success: function (data) {
            var result = JSON.parse(data);

            if (result[0] === 'error') {
                alert(result[1]);
            } else
            {
                $('.name').text('Name: ' + result.fn + ' ' + result.ln);
                $('.role').text('Role: ' + result.role);
                $('.email').text('Email: ' + result.em);
                $('.number').text('Cell Number: ' + result.cell);
                if (result.bio !== "") {
                    $('.bio').text(result.bio);
                }
                if (result.pic !== "") {
                    $('.profile_image').attr('src', result.pic);

                }


                $('#firstname').val(result.fn);
                $('#lastname').val(result.ln);
                $('#username').val(result.un);
                $('#cellnumber').val(result.cell);
                $('#email').val(result.em);
                $('#role').val(result.role);


            }
        }
    });

    $('#update_particulars').click(function () {
        var fn = $('#firstname').val();
        var ln = $('#lastname').val();
        var un = $('#username').val();
        var cell = $('#cellnumber').val();
        var em = $('#email').val();
        var role = $('#role').val();
        
        
        $.ajax({
            url: 'dashboard_scripts/update_profile_info.php',
            type: 'POST',
            data: {fn: fn, ln: ln, un: un, cell: cell, em: em, role: role},
            success: function(){
                $('#firstname').val(fn);
                $('#lastname').val(ln);
                $('#username').val(un);
                $('#cellnumber').val(cell);
                $('#email').val(em);
                $('#role').val(role);
            }
        })
        
    });
    
    $('#update_password').click(function(){
        var curr_pass = $('#curr_pass').val();
        var new_pass = $('#new_pass').val();
        
        if(curr_pass !== "" && new_pass !== ""){
            $.ajax({
                url: 'dashboard_scripts/update_password.php',
                type: 'post',
                data: {curr: curr_pass, new: new_pass},
                success: function(result){
                    console.log(result);
                }
            });
        }
        
        
        
    });


});