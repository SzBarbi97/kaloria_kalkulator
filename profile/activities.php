<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/activities.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/activities.css">
</head>

<body class="background">
    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Tevékenységek</h1>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col text-right">
                <button type=" button" class="btn btn-primary" id="tevekenyseghezNavigal" onclick="navigateToNewActivitie()">Új tevékenység hozzáadása</button>
            </div>
        </div>
    </div>

    <div class="container rounded center bg-white border mt-5">
        <div class="row mt-2 mr-2 ml-2">
            <div class="col-11">
                <div class="row font-weight-bold">
                    <div class="col-12 col-sm-12 col-md-6 text-center center">
                        <p>Mozgásforma neve</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 text-center center">
                        <p>Elégetett kalória/60perc</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 mr-2 ml-2">
            <div class="col-11">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 text-center center">
                        <p>Futás</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 text-center center">
                        <p>300 kcal</p>
                    </div>
                </div>
            </div>

            <div class="col-1">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <button type="button" class="btn" id="delete" data-toggle="modal" data-target="#delete-modal">
                            <span class="icon">
                                <i class="fa fa-trash color-red" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <button type="button" class="btn" id="edit" data-toggle="modal" data-target="#edit-modal">
                            <span class="icon">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal rounded" id="delete-modal" data-backdrop="static" data-keyboard="false">
            <div class="modal-text font-weight-bold">
                <p class="text-center mt-3">Biztosan törölni szeretné ezt az adatot?</p>
            </div>

            <div class="modal-footer">
                <div class="row center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <button type="button" class="btn btn-danger btn-style" id="torol" data-dismiss="modal">Igen</button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <button type="button" class="btn btn-primary btn-style" data-dismiss="modal">Mégse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>