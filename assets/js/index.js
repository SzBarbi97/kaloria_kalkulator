$(document).ready(function () {
    $("#btn-reg-header").click(getRegistrationPhp);

    $("#btn-log-header").click(getLoginPhp);

});

function getRegistrationPhp() {
    $.get(
        "registration.php",
        function (data) {
            $("#content").html(data);
            $("#btn-log-header").removeClass("btn-header-active");
            $("#btn-reg-header").addClass("btn-header-active");
        }
    )
}

function getLoginPhp() {
    $.get(
        "login.php",
        function (data) {
            $("#content").html(data);
            $("#btn-reg-header").removeClass("btn-header-active");
            $("#btn-log-header").addClass("btn-header-active");
        }
    )
}

