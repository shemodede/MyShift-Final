$(document).ready(function () {
    $('#imageUploadForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'dashboard_scripts/profile_pic_upload_handler.php',
            type: 'post',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log("successful upload");
                //var result = JSON.parse(data);
                if (data !== '') {
                    $('.profile_image').attr('src', data);
                    console.log(data);
                }
            },
            error: function (data) {
                console.log("Error uploading");
                console.log(data);
            }
        });
    });

    $('#remove_ppic').click(function () {
        $.ajax({
            url: 'dashboard_scripts/remove_profile_pic.php',
            type: 'post',
            success: function (result) {
                if (result === "success") {
                    var place_holder = "images/profile_pictures/profile_placeholder.jpg";
                    $('#profile_pic_case').html('<img src="images/profile_pictures/profile_placeholder.jpg" class="profile_image" width="300px" height="300px" alt="">');
                }
            }
        });
    });

});