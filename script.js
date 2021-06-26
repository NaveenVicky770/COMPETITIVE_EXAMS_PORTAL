$(document).ready(function() {
    //login functionality
    $("#login").click(function() {
        var id = $("#id").val();
        var password = $("#password").val();
        if (id == "" || password == "") {
            $("#error-box").css("display", "block");
            $("#error-box").text("All fields are required!!!");
            return;
        } else {
            $("#error-box").css("display", "none");
            $("#error-box").text("");
            $.post("includes/login-inc.php", { id: id, password: password }, function(data) {
                $("#error-box").html(data);
            });
        }
    });
    //logout functionality
    $("#logout").click(function() {
        $.post("includes/login-inc.php", { logout: true }, function(data) {
            $(".logout-box").html(data);
        });
    });
    
       $("#subject").change(function() {
        var subject = $("#subject").val();
        $("#survey-error-box").css("display", "none");
        $("#survey_form").html("");
        $("#submit_survey").css("display", "none");
        $('#submit_survey').prop('disabled', false);
        if (subject != "") {
            $("#topic").load("includes/login-inc.php", {
                subject: subject
            });
        } else if (subject == "") {
            $("#topic").html("<option value=''>Select Topic</option>");
        }
    });
   
});
