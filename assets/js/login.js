function userLogin() {
    const email = $("#email").val();
    const jelszo = $("#jelszo").val();

    const email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const emailFormatumHelyes = email.match(email_regex);

    var helyesMezokSzama = 0;

    if (email.length < 1) {
        $("#email").addClass("is-invalid");
        $("#emailHiba").html("Kötelező mező!");
        $("#emailHiba").show();
    } else if (emailFormatumHelyes == null) {
        $("#email").removeClass("is-invalid");
        $("#emailHiba").html("Érvénytelen email formátum!");
        $("#emailHiba").show();
    } else {
        $("#email").removeClass("is-invalid");
        $("#emailHiba").hide();
        helyesMezokSzama += 1;
    }

    if (jelszo.length < 1) {
        $("#jelszo").addClass("is-invalid");
        $("#jelszoHiba").html("Kötelező mező!");
        $("#jelszoHiba").show();
    } else {
        $("#jelszo").removeClass("is-invalid");
        $("#jelszoHiba").hide();
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 2) {
        $.post(
            "controller/login-controller.php",
            {
                email: email,
                jelszo: jelszo
            },
            function (response) {
                if (response.success) {
                    window.location.href = "profile/overview.php";
                } else {
                    $("#emailcimvagyjelszoHiba").html("Nem megfelelő email cím vagy jelszó!");
                    $("#emailcimvagyjelszoHiba").show();
                }
            }
        )
    }
}