$('.msgsubmit').on('click', function (e) {
    //e.preventDefault();
    let email = $("#email").val();
    let message = $("#msg").val();
    let responseDiv = $("#response");

    if (email !== "" && message !== "") {
        $.ajax({
            type: 'post',
            url: '../assets/inc/msg.php',
            data: {
                email,
                message
            },
            cache: false,
            success: function (response) {
                $('#response').html('<p style="color: green;">' + response + '</p>');
                $("#email").val("");
                $("#msg").val("");
            },
            error: function (error) {
                $('#response').html('<p style="color: red;">Error: ' + error.responseText + '</p>');
            }
        });
    }
    else if (email === "") {
        responseDiv.html("<p style='color: red;'>*Email cannot be empty.</p>");
    }
    else if (message === "") {
        responseDiv.html("<p style='color: red;'>*Message cannot be empty.</p>");
    }
    else {
        responseDiv.html("<p style='color: red;'>something went wrong please try again later/p>");
    }

    return false;
});