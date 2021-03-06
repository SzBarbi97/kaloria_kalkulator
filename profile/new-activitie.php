<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/new-activitie.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body class="background">

    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Új tevékenység hozzáadása</h1>
    </div>

    <div class="container rounded center text-center bg-white border font-weight-bold mt-5 mb-5">

        <p class="mt-3 text-center text-primary font-italic">60 perc / tevékenységben add meg a kért adatokat!</p>

        <div class="row">
            <div class="col-12">
                <label for="termek-neve">Tevékenység neve</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control input-field max-width-500px center" id="tevekenyseg-neve">
            </div>
            <div class="invalid-feedback" id="tevekenysegHiba"></div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label for="elegetett-kaloria">Elégetett kalória</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control input-field max-width-500px center" id="elegetett-kaloria">
            </div>
            <div class="invalid-feedback" id="kaloriaHiba"></div>
        </div>

        <div class="text-center mt-4 mb-3">
            <button type="button" class="btn btn-success btn-style max-width-500px" id="hozzaad" onclick="newActivitie()">Hozzáad</button>
        </div>

    </div>
</body>

</html>