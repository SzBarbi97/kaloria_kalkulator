function newActivitie() {
    const tevekenysegNeve = $("#tevekenyseg-neve").val();
    const elegetettKaloria = $("#elegetett-kaloria").val();

    var elegetettKaloriaHelytelen = isNaN(parseInt(elegetettKaloria));

    var helyesMezokSzama = 0;

    if (tevekenysegNeve.length < 1) {
        $("#tevekenyseg-neve").addClass("is-invalid");
        $("#tevekenysegHiba").html("Kötelező mező!");
        $("#tevekenysegHiba").show();
    } else {
        $("#tevekenyseg-neve").removeClass("is-invalid");
        $("#tevekenysegHiba").hide();
        helyesMezokSzama += 1;
    }

    if (elegetettKaloria.length < 1) {
        $("#elegetett-kaloria").addClass("is-invalid");
        $("#kaloriaHiba").html("Kötelező mező!");
        $("#kaloriaHiba").show();
    } else if (elegetettKaloriaHelytelen) {
        $("#elegetett-kaloria").addClass("is-invalid");
        $("#kaloriaHiba").html("Csak számokat tartalmazhat!")
        $("#kaloriaHiba").show();
    } else {
        $("#elegetett-kaloria").removeClass("is-invalid");
        $("#kaloriaHiba").hide();
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 2) {
        $.post(
            "../controller/new-activity-controller.php",
            {
                tevekenysegNeve: tevekenysegNeve,
                elegetettKaloria: elegetettKaloria
            },
            function (response) {
                if (response.success) {
                    window.location.href = "activities.php";
                } else {
                    if (response.error == "tevekenysegNeve") {
                        $("#tevekenyseg-neve").addClass("is-invalid");
                        $("#tevekenysegHiba").html("Ez a tevékenység már szerepel az adatbázisban!");
                        $("#tevekenysegHiba").show();
                    }
                }
            }
        )

    }
}