$(document).ready(function() {
    $(".registration_form").submit(function(e) {
        e.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "service/php/registration.php",
            data: form_data,
            success: function(response) {
                alert(response);
            }
        });
    });
});