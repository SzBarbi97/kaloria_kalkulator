function userRegistration() {
    const nev = $("#nev").val();
    const email = $("#email").val();
    const jelszo = $("#jelszo").val();
    const jelszo_ujra = $("#jelszo-ujra").val();
    const nem = $("#nem").val();
    const eletkor = $("#eletkor").val();
    const magassag = $("#magassag").val();
    const testsuly = $("#testsuly").val();
    const adatvedelmi = $("#adatvedelmi").is(":checked");

    const nev_regex = /[0-9]/g;
    const email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    const nevbenVanSzam = nev.match(nev_regex);
    const emailFormatumHelyes = email.match(email_regex);

    var helyesMezokSzama = 0;

    if (nev.length < 1) {
        $("#nev").addClass("is-invalid");
        $("#nevHiba").html("Kötelező mező!");
        $("#nevHiba").show();
    } else if (nevbenVanSzam != null) {
        $("#nev").addClass("is-invalid");
        $("#nevHiba").html("Csak betűket tartalmazhat!");
        $("#nevHiba").show();
    } else {
        $("#nev").removeClass("is-invalid");
        $("#nevHiba").hide();
        helyesMezokSzama += 1;
    }

    if (email.length < 1) {
        $("#email").addClass("is-invalid");
        $("#emailHiba").html("Kötelező mező!");
        $("#emailHiba").show();
    } else if (emailFormatumHelyes == null) {
        $("#email").addClass("is-invalid");
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
    } else if (jelszo.length < 6) {
        $("#jelszo").addClass("is-invalid");
        $("#jelszoHiba").html("A jelszó minimum 6 karakter!");
        $("#jelszoHiba").show();
    } else {
        $("#jelszo").removeClass("is-invalid");
        $("#jelszoHiba").hide();
        helyesMezokSzama += 1;
    }

    if (jelszo_ujra.length < 1) {
        $("#jelszo-ujra").addClass("is-invalid");
        $("#jelszoUjraHiba").html("Kötelező mező!");
        $("#jelszoUjraHiba").show();
    } else if (jelszo_ujra != jelszo) {
        $("#jelszo-ujra").addClass("is-invalid");
        $("#jelszoUjraHiba").html("A jelszó nem egyezik!");
        $("#jelszoUjraHiba").show();
    } else {
        $("#jelszo-ujra").removeClass("is-invalid");
        $("#jelszoUjraHiba").hide();
        helyesMezokSzama += 1;
    }

    if (nem == "Nem") {
        $("#nem").addClass("is-invalid");
        $("#nemHiba").html("Kötelező mező!");
    } else {
        $("#nem").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (eletkor == "Életkor") {
        $("#eletkor").addClass("is-invalid");
        $("#eletkorHiba").html("Kötelező mező!");
    } else {
        $("#eletkor").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (magassag == "Magasság") {
        $("#magassag").addClass("is-invalid");
        $("#magassagHiba").html("Kötelező mező!");
    } else {
        $("#magassag").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (testsuly == "Testsúly") {
        $("#testsuly").addClass("is-invalid");
        $("#testsulyHiba").html("Kötelező mező!");
    } else {
        $("#testsuly").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (!adatvedelmi) {
        $("#adatvedelmi").addClass("is-invalid");
        $("#adatvedelmiHiba").html("Az adatvédelmi szabályzat elfogadása kötelező!");
    } else {
        $("#adatvedelmi").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 9) {
        $.post(
            "controller/registration-controller.php",
            {
                nev: nev,
                email: email,
                jelszo: jelszo,
                nem: nem,
                eletkor: eletkor,
                magassag: magassag,
                testsuly: testsuly
            },
            function (response) {
                if (response.success) {
                    getLoginPhp();
                } else {
                    if (response.error == "email") {
                        $("#email").addClass("is-invalid");
                        $("#emailHiba").html("Az email cím már foglalt!");
                        $("#emailHiba").show();
                    }
                }
            }
        )
    }
}