$(document).ready(function() {
    $(".login_form").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "service/php/login.php",
            data: form_data,
            success: function(response) {
                var resp = JSON.parse(response);
                alert(resp["res"]);

                if(resp["res"] == "OK"){
                    $(".cont").css("display", "none");
                    $(".usercont").css("display", "block");
                }
            }
        });
    });
});