function newFood() {
    const termekNeve = $("#termek-neve").val();
    const feherje = $("#feherje").val();
    const szenhidrat = $("#szenhidrat").val();
    const zsir = $("#zsir").val();
    const cukor = $("#cukor").val();
    const kaloria = $("#kaloria").val();

    var feherjeHelytelen = isNaN(parseInt(feherje));
    var szenhidratHelytelen = isNaN(parseInt(szenhidrat));
    var zsirHelytelen = isNaN(parseInt(zsir));
    var cukorHelytelen = isNaN(parseInt(cukor));
    var kaloriaHelytelen = isNaN(parseInt(kaloria));

    var helyesMezokSzama = 0;

    if (termekNeve.length < 1) {
        $("#termek-neve").addClass("is-invalid");
        $("#termekHiba").html("Kötelező mező!");
        $("#termekHiba").show();
    } else {
        $("#termek-neve").removeClass("is-invalid");
        $("#termekHiba").hide();
        helyesMezokSzama += 1;
    }

    if (feherje.length < 1) {
        $("#feherje").addClass("is-invalid");
        $("#feherjeHiba").html("Kötelező mező!");
        $("#feherjeHiba").show();
    } else if (feherjeHelytelen) {
        $("feherje").addClass("is-invalid");
        $("#feherjeHiba").html("Csak számokat tartalmazhat!");
        $("#feherjeHiba").show();
    } else {
        $("#feherje").removeClass("is-invalid");
        $("#feherjeHiba").hide();
        helyesMezokSzama += 1;
    }

    if (szenhidrat.length < 1) {
        $("#szenhidrat").addClass("is-invalid");
        $("#szenhidratHiba").html("Kötelező mező!");
        $("#szenhidratHiba").show();
    } else if (szenhidratHelytelen) {
        $("#szenhidrat").addClass("is-invalid");
        $("#szenhidratHiba").html("Csak számokat tartalmazhat!");
        $("#szenhidratHiba").show();
    } else {
        $("#szenhidrat").removeClass("is-invalid");
        $("#szenhidratHiba").hide();
        helyesMezokSzama += 1;
    }

    if (zsir.length < 1) {
        $("#zsir").addClass("is-invalid");
        $("#zsirHiba").html("Kötelező mező!");
        $("#zsirHiba").show();
    } else if (zsirHelytelen) {
        $("#zsir").addClass("is-invalid");
        $("#zsirHiba").html("Csak számokat tartalmazhat!");
        $("#zsirHiba").show();
    } else {
        $("#zsir").removeClass("is-invalid");
        $("#zsirHiba").hide();
        helyesMezokSzama += 1;
    }

    if (cukor.length < 1) {
        $("#cukor").addClass("is-invalid");
        $("#cukorHiba").html("Kötelező mező!");
        $("#cukorHiba").show();
    } else if (cukorHelytelen) {
        $("#cukor").addClass("is-invalid");
        $("#cukorHiba").html("Csak számokat tartalmazhat!");
        $("#cukorHiba").show();
    } else {
        $("#cukor").removeClass("is-invalid");
        $("#cukorHiba").hide();
        helyesMezokSzama += 1;
    }

    if (kaloria.length < 1) {
        $("#kaloria").addClass("is-invalid");
        $("#kaloriaHiba").html("Kötelező mező!");
        $("#kaloriaHiba").show();
    } else if (kaloriaHelytelen) {
        $("#kaloria").addClass("is-invalid");
        $("#kaloriaHiba").html("Csak számokat tartalmazhat!");
        $("#kaloriaHiba").show();
    } else {
        $("#kaloria").removeClass("is-invalid");
        $("#kaloriaHiba").hide();
        helyesMezokSzama += 1;
    }
}