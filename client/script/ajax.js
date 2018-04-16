$(document).ready(function() {
    $(".registration_form").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../components/registration.php",
            data: form_data,
            success: function(response) {
                alert(response);
            }
        });
    });
});

$(document).ready(function() {
    $(".login_form").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../components/login.php",
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

$(document).ready(function(){
    $(".usercont").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            data: form_data,
            success: function () {
                $('#myModal').modal('show');
            }
        });
    });
});

$(document).ready(function() {
    $(".edit_form").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../components/edit.php",
            data: form_data,
            success: function(response) {
                console.log(response);
            }
        });
    });
});