<?php
require "../model/user-model.php";
session_start();
$currentUser = UserModel::getCurrentUser();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/password.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body class="background">
    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Jelszó módosítása</h1>
    </div>

    <div class="container rounded center text-center bg-white border font-weight-bold mt-5 mb-5">

        <div class="row mt-3">
            <div class="col-12">
                <label>Új jelszó</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="password" class="form-control input-field max-width-500px center" id="ujjelszo">
            </div>
            <div class="invalid-feedback" id="ujjelszoHiba"></div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label>Új jelszó megerősítése</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="password" class="form-control input-field max-width-500px center" id="ujjelszomegerosites">
            </div>
            <div class="invalid-feedback" id="jelszoUjraHiba"></div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label>Régi jelszó</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="password" class="form-control input-field max-width-500px center" id="regijelszo">
            </div>
            <div class="invalid-feedback" id="regijelszoHiba"></div>
        </div>

        <div class="text-center mt-4 mb-3">
            <button type="button" class="btn btn-success btn-style max-width-500px" id="mentes" onclick="password()">Mentés</button>
        </div>
    </div>
</body>

</html>