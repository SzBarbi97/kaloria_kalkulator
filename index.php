<!DOCTYPE html>
<html lang="hu">

<head>
    <title>Kalória kalkulátor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/global.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/registration.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="background font-family">
    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-11 col-sm-5 mt-sm-5 mb-4 text-center center rounded p-3">
                <div class="text-white">
                    <h1 class="font-weight-bold">Kalória kalkulátor</h1>
                    <p class="font-italic font-weight-bold">A kitartásod megfogja hozni a várt eredményt!</p>
                </div>
            </div>

            <div class="col-11 col-sm-6 center text-center rounded bg-white">
                <div class="btn-group mt-3" role="group">
                    <button type="button" class="btn btn-header btn-header-active mr-2" id="btn-log-header">Bejelentkezés</button>
                    <button type="button" class="btn btn-header" id="btn-reg-header">Regisztráció</button>
                </div>

                <div id="content">
                    <?php require_once("login.php"); ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>