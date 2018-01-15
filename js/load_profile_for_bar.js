$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/load_profile_pic.php',
        type: 'post',
        success: function (result) {
            var data = JSON.parse(result);
            if (data.file_path !== "") {
                $('#profile_link').html(data.fn + " " + data.ln + '<img src="' + data.file_path + '" />')
            }
        }
    });
});