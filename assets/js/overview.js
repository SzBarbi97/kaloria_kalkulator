$(document).ready(function () {
    $("#overview-link").addClass("active");
});

function overviewEtel() {
    const etelek = $("#etelek").val();
    const fogyasztottMennyiseg = $("#fogyasztottMennyiseg").val();

    var fogyasztottMennyisegHelytelen = isNaN(parseInt(fogyasztottMennyiseg));

    var helyesMezokSzama = 0;

    if (etelek == "Ételek") {
        $("#etelek").addClass("is-invalid");
        $("#etelHiba").html("Kötelező mező!");
        $("#etelHiba").show();
    } else {
        $("#etelek").removeClass("is-invalid");
        $("#etelHiba").hide();
        helyesMezokSzama += 1;
    }

    if (fogyasztottMennyiseg.length < 1) {
        $("#fogyasztottMennyiseg").addClass("is-invalid");
        $("#fogyasztottMennyisegHiba").html("Kötelező mező!");
        $("#fogyasztottMennyisegHiba").show();
    } else if (fogyasztottMennyisegHelytelen) {
        $("#fogyasztottMennyiseg").addClass("is-invalid");
        $("#fogyasztottMennyisegHiba").html("Csak számokat tartalmazhat!");
        $("#fogyasztottMennyisegHiba").show();
    } else {
        $("#fogyasztottMennyiseg").removeClass("is-invalid");
        $("#fogyasztottMennyisegHiba").hide();
        helyesMezokSzama += 1;
    }
}

function overviewSport() {
    const edzesforma = $("#edzesforma").val();
    const sportoltido = $("#sportoltido").val();

    var idoHelytelen = isNaN(parseInt(sportoltido));

    var helyesMezokSzama = 0;

    if (edzesforma == "Mozgásformák") {
        $("#edzesforma").addClass("is-invalid");
        $("#edzesformaHiba").html("Kötelező mező!");
        $("#edzesformaHiba").show();
    } else {
        $("#edzesforma").removeClass("is-invalid");
        $("#edzesformaHiba").hide();
        helyesMezokSzama += 1;
    }

    if (sportoltido < 1) {
        $("#sportoltido").addClass("is-invalid");
        $("#idoHiba").html("Kötelező mező!");
        $("#idoHiba").show();
    } else if (idoHelytelen) {
        $("#sportoltido").addClass("is-invalid");
        $("#idoHiba").html("Csak számokat tartalmazhat!");
        $("#idoHiba").show();
    } else {
        $("#sportoltido").removeClass("is-invalid");
        $("#idoHiba").hide();
    }
}

function changeDaysBy(day) {
    var overviewDate = new Date($("#overviewDate").text());
    overviewDate.setDate(overviewDate.getDate() + day);

    if (new Date() >= overviewDate) {
        $("#overviewDate").html(overviewDate.toLocaleDateString().replaceAll(". ", "-").replace(".", ""));

        // todo betölteni az aktuális áttekintést
    }
}