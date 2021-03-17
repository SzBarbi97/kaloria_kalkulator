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
    <script src="../assets/js/basic-data.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body class="background">
    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Alapadatok</h1>
    </div>

    <div class="container rounded center text-center bg-white border font-weight-bold mt-5 mb-5">

        <div class="row mt-3">
            <div class="col-12">
                <label>Magasság</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="magassag">
                <?php
                $felhasznaloMagassag = $currentUser["magassag"];
                for ($magassag = 1; $magassag <= 250; $magassag++) {
                    if ($felhasznaloMagassag == $magassag) {
                        echo "<option selected value=" . $magassag . ">$magassag cm</option>";
                    } else {
                        echo "<option value=" . $magassag . ">$magassag cm</option>";
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback" id="magassagHiba"></div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label>Testsúly</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="testsuly">
                <?php
                $felhasznaloTestsuly = $currentUser["testsuly"];
                for ($testsuly = 1; $testsuly <= 300; $testsuly++) {
                    if ($felhasznaloTestsuly == $testsuly) {
                        echo "<option selected value=" . $testsuly . ">$testsuly kg</option>";
                    } else {
                        echo "<option value=" . $testsuly . ">$testsuly kg</option>";
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback" id="testsulyHiba"></div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label>Életkor</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="eletkor">
                <?php
                $felhasznaloEletkor = $currentUser["eletkor"];
                for ($eletkor = 1; $eletkor < 100; $eletkor++) {
                    if ($felhasznaloEletkor == $eletkor) {
                        echo "<option selected value=" . $eletkor . ">$eletkor</option>";
                    } else {
                        echo "<option value=" . $eletkor . ">$eletkor</option>";
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback" id="eletkorHiba"></div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Nem</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="font-weight-normal" id="nem"><?php echo $currentUser["nem"] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Alapanyagcsere</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="font-weight-normal" id="bmr"><?php echo $currentUser["alapanyagcsere"] ?></p>
            </div>
        </div>

        <div class="text-center mt-4 mb-3">
            <button type="button" class="btn btn-success btn-style max-width-500px" id="mentes" onclick="saveBasicData()">Mentés</button>
        </div>
    </div>
</body>

</html>