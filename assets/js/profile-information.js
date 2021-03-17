function profileInformation() {
    const teljesnev = $("#teljesnev").val();
    const emailcim = $("#emailcim").val();
    const jelszo = $("#jelszo").val();

    const nev_regex = /[0-9]/g;
    const email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    const nevbenVanSzam = teljesnev.match(nev_regex);
    const emailFormatumHelyes = emailcim.match(email_regex);

    var helyesMezokSzama = 0;

    if (teljesnev.length < 1) {
        $("#teljesnev").addClass("is-invalid");
        $("#nevHiba").html("Kötelező mező!");
        $("#nevHiba").show();
    } else if (nevbenVanSzam != null) {
        $("#teljesnev").addClass("is-invalid");
        $("#nevHiba").html("Csak betűket tartalmazhat!");
        $("#nevHiba").show();
    } else {
        $("#teljesnev").removeClass("is-invalid");
        $("#nevHiba").hide();
        helyesMezokSzama += 1;
    }

    if (emailcim.length < 1) {
        $("#emailcim").addClass("is-invalid");
        $("#emailHiba").html("Kötelező mező!");
        $("#emailHiba").show();
    } else if (emailFormatumHelyes == null) {
        $("#emailcim").addClass("is-invalid");
        $("#emailHiba").html("Érvénytelen email formátum!");
        $("#emailHiba").show();
    } else {
        $("#emailcim").removeClass("is-invalid");
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

    if (helyesMezokSzama == 3) {
        $.post(
            "../controller/profile-information-controller.php",
            {
                teljesnev: teljesnev,
                emailcim: emailcim,
                jelszo: jelszo
            },
            function (response) {
                if (!response.success) {
                    $("#jelszoHiba").html("Nem egyezik a megadott jelszó a regisztrált jelszóval!")
                    $("#jelszoHiba").show();
                }
            }
        )
    }

}