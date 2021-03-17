$(document).ready(function () {
    $("#magassag").change(function () {
        setBMR();
    });

    $("#testsuly").change(function () {
        setBMR();
    });

    $("#eletkor").change(function () {
        setBMR();
    });
});

function setBMR() {
    const magassag = $("#magassag").val();
    const testsuly = $("#testsuly").val();
    const eletkor = $("#eletkor").val();
    const nem = $("#nem").text();
    const bmr = calculateBMR(magassag, testsuly, eletkor, nem);
    $("#bmr").html(bmr + " kcal");
}

function saveBasicData() {
    const magassag = $("#magassag").val();
    const testsuly = $("#testsuly").val();
    const eletkor = $("#eletkor").val();
    const bmr = $("#bmr").text();

    var helyesMezokSzama = 0;

    if (isNaN(parseInt(magassag))) {
        $("#magassag").addClass("is-invalid");
        $("#magassagHiba").html("Érvénytelen mező!");
    } else {
        $("#magassag").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (isNaN(parseInt(testsuly))) {
        $("#testsuly").addClass("is-invalid");
        $("#testsulyHiba").html("Érvénytelen mező!");
    } else {
        $("#testsuly").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (isNaN(parseInt(eletkor))) {
        $("#eletkor").addClass("is-invalid");
        $("#eletkorHiba").html("Érvénytelen mező!");
    } else {
        $("#eletkor").removeClass("is-invalid");
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 3) {
        $.post(
            "../controller/basic-data-controller.php",
            {
                magassag: magassag,
                testsuly: testsuly,
                eletkor: eletkor,
                bmr: bmr
            }
        )
    }
}