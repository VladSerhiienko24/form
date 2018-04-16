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