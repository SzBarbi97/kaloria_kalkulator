function password() {
    const ujjelszo = $("#ujjelszo").val();
    const ujjelszomegerosites = $("#ujjelszomegerosites").val();
    const regijelszo = $("#regijelszo").val();

    var helyesMezokSzama = 0;

    if (ujjelszo.length < 1) {
        $("#ujjelszo").addClass("is-invalid");
        $("#ujjelszoHiba").html("Kötelező mező!");
        $("#ujjelszoHiba").show();
    } else if (ujjelszo.length < 6) {
        $("#ujjelszo").addClass("is-invalid");
        $("#ujjelszoHiba").html("A jelszó minimum 6 karakter!");
        $("#ujjelszoHiba").show();
    } else {
        $("#ujjelszo").removeClass("is-invalid");
        $("#ujjelszoHiba").hide();
        helyesMezokSzama += 1;
    }

    if (ujjelszomegerosites.length < 1) {
        $("#ujjelszomegerosites").addClass("is-invalid");
        $("#jelszoUjraHiba").html("Kötelező mező!");
        $("#jelszoUjraHiba").show();
    } else if (ujjelszomegerosites != ujjelszo) {
        $("#ujjelszomegerosites").addClass("is-invalid");
        $("#jelszoUjraHiba").html("A jelszó nem egyezik!");
        $("#jelszoUjraHiba").show();
    } else {
        $("#ujjelszomegerosites").removeClass("is-invalid");
        $("#jelszoUjraHiba").hide();
        helyesMezokSzama += 1;
    }

    if (regijelszo.length < 1) {
        $("#regijelszo").addClass("is-invalid");
        $("#regijelszoHiba").html("Kötelező mező!");
        $("#regijelszoHiba").show();
    } else {
        $("#regijelszo").removeClass("is-invalid");
        $("#regijelszoHiba").hide();
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 3) {
        $.post(
            "../controller/password-controller.php",
            {
                ujjelszo: ujjelszo,
                regijelszo: regijelszo
            },
            function (response) {
                if (!response.success) {
                    $("#regijelszoHiba").html("Nem egyezik a megadott jelszó a regisztrált jelszóval!");
                    $("#regijelszoHiba").show();
                }
            }
        )
    }

}