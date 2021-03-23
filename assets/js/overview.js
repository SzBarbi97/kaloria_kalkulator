$(document).ready(function () {
    $("#overview-link").addClass("active");

    var alapFeherje = 0;
    var alapSzenhidrat = 0;
    var alapZsir = 0;
    var alapCukor = 0;
    var alapKaloria = 0;

    var feherje = 0;
    var szenhidrat = 0;
    var zsir = 0;
    var cukor = 0;
    var kaloria = 0;

    var alapElegetettKaloria = 0;
    var elegetettKaloria = 0;

    var deleteConsumedFoodId = -1;
    var deleteCompletedSportId = -1;

    $('#etelek').on('change', function () {
        if (this.value != 'Ételek') {
            setupFoodDetails(this.value);
        } else {
            setupDefaultFoodDetails();
        }
    });

    $('#fogyasztottMennyiseg').on('input', function () {
        setFoodDetails();
    });

    $('#edzesforma').on('change', function () {
        if (this.value != 'Mozgásformák') {
            setupActivityDetails(this.value);
        } else {
            setupDefaultActivityDetails();
        }
    });

    $('#sportoltido').on('input', function () {
        setActivityDetails();
    });

});

function calculateFoodDetails() {
    const elelmiszerNeve = $("#etelek option:selected").text();
    const fogyasztottMennyiseg = $("#fogyasztottMennyiseg").val();

    if (elelmiszerNeve != "Ételek" && !isNaN(fogyasztottMennyiseg)) {
        feherje = alapFeherje / 100 * fogyasztottMennyiseg;
        szenhidrat = alapSzenhidrat / 100 * fogyasztottMennyiseg;
        zsir = alapZsir / 100 * fogyasztottMennyiseg;
        cukor = alapCukor / 100 * fogyasztottMennyiseg;
        kaloria = alapKaloria / 100 * fogyasztottMennyiseg;
    } else {
        feherje = 0;
        szenhidrat = 0;
        zsir = 0;
        cukor = 0;
        kaloria = 0;
    }
}

function setFoodDetails() {
    calculateFoodDetails();
    $("#kivalasztott-etel-feherje").html(Math.round(feherje) + " g");
    $("#kivalasztott-etel-szenhidrat").html(Math.round(szenhidrat) + " g");
    $("#kivalasztott-etel-zsir").html(Math.round(zsir) + " g");
    $("#kivalasztott-etel-cukor").html(Math.round(cukor) + " g");
    $("#kivalasztott-etel-kaloria").html(Math.round(kaloria) + " kcal");
}

function setupDefaultFoodDetails() {
    alapFeherje = 0;
    alapSzenhidrat = 0;
    alapZsir = 0;
    alapCukor = 0;
    alapKaloria = 0;
    setFoodDetails();
}

function setupFoodDetails(foodId) {
    $.post(
        "../controller/get-selected-food-controller.php",
        {
            foodId: foodId
        },
        function (response) {
            if (response.success) {
                alapFeherje = response.feherje;
                alapSzenhidrat = response.szenhidrat;
                alapZsir = response.zsir;
                alapCukor = response.cukor;
                alapKaloria = response.kaloria;
                setFoodDetails();
            }
        }
    )
}

function calculateActivityDetails() {
    const edzesforma = $("#edzesforma option:selected").text();
    const sportoltido = $("#sportoltido").val();

    if (edzesforma != "Mozgásformák" && !isNaN(parseInt(sportoltido))) {
        elegetettKaloria = alapElegetettKaloria / 60 * sportoltido;
    } else {
        elegetettKaloria = 0;
    }
}

function setActivityDetails() {
    calculateActivityDetails();
    $("#kivalasztott-sport-elegetett-kaloria").html(Math.round(elegetettKaloria) + " kcal");
}

function setupDefaultActivityDetails() {
    alapElegetettKaloria = 0;
    setActivityDetails();
}

function setupActivityDetails(activityId) {
    $.post(
        "../controller/get-selected-activity-controller.php",
        {
            activityId: activityId
        },
        function (response) {
            if (response.success) {
                alapElegetettKaloria = response.elegetettKaloria;
                setActivityDetails();
            }
        }
    )
}

function setDeleteIds(foodId, sportId) {
    deleteConsumedFoodId = foodId;
    deleteCompletedSportId = sportId;
}

function deleteBySelectedId() {
    if (deleteConsumedFoodId != -1) {
        deleteFood();
    } else if (deleteCompletedSportId != -1) {
        deleteSport();
    }
}

function deleteFood() {
    const datum = $("#overviewDate").html();
    $.post(
        "../controller/delete-consumed-food-controller.php",
        {
            consumedFoodId: deleteConsumedFoodId,
            datum: datum
        },
        function (response) {
            if (response.success) {
                window.location.reload();
            }
        }
    )
}

function deleteSport() {
    const datum = $("#overviewDate").html();
    $.post(
        "../controller/delete-completed-sport-controller.php",
        {
            completedSportId: deleteCompletedSportId,
            datum: datum
        },
        function (response) {
            if (response.success) {
                window.location.reload();
            }
        }
    )
}

function addFood() {
    const elelmiszerNeve = $("#etelek option:selected").text();
    const fogyasztottMennyiseg = $("#fogyasztottMennyiseg").val();
    const datum = $("#overviewDate").html();

    var fogyasztottMennyisegHelytelen = isNaN(parseInt(fogyasztottMennyiseg));

    var helyesMezokSzama = 0;

    if (elelmiszerNeve == "Ételek") {
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

    if (helyesMezokSzama == 2) {
        $.post(
            "../controller/consumed-food-controller.php",
            {
                datum: datum,
                elelmiszerNeve: elelmiszerNeve,
                mennyiseg: fogyasztottMennyiseg,
                feherje: feherje,
                szenhidrat: szenhidrat,
                zsir: zsir,
                cukor: cukor,
                kaloria: kaloria
            },
            function (response) {
                if (response.success) {
                    window.location.reload();
                }
            }
        )
    }
}

function addSport() {
    const edzesforma = $("#edzesforma option:selected").text();
    const sportoltido = $("#sportoltido").val();
    const datum = $("#overviewDate").html();

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
        helyesMezokSzama += 1;
    }

    if (helyesMezokSzama == 2) {
        $.post(
            "../controller/completed-sport-controller.php",
            {
                datum: datum,
                mozgasformaNeve: edzesforma,
                sportoltIdo: sportoltido,
                elegetettKaloria: elegetettKaloria
            },
            function (response) {
                if (response.success) {
                    window.location.reload();
                }
            }
        )
    }
}

function changeDaysBy(day) {
    if (day == 0) {
        window.location.href = "../profile/overview.php";
    } else if (day < 0) {
        window.location.href = "../profile/overview.php?day=" + day;
    }
}