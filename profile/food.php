<?php
require "../model/food-model.php";

session_start();
$foods = FoodModel::getFoods();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/food.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/food.css">
</head>

<body class="background">

    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Élelmiszerek</h1>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col text-right">
                <button type=" button" class="btn btn-primary" id="elelmiszerhezNavigal" onclick="navigateToNewFood()">Új élelmiszer hozzáadása</button>
            </div>
        </div>
    </div>

    <div class="container rounded center bg-white border mt-5 mb-5">

        <div class="table mt-4 d-flex justify-content-center">
            <table>
                <thead>
                    <th class="font-wight-bold pr-3">Élelmiszer neve</th>
                    <th class="font-wight-bold pr-3">Fehérje</th>
                    <th class="font-wight-bold pr-3">Szénhidrát</th>
                    <th class="font-wight-bold pr-3">Zsír</th>
                    <th class="font-wight-bold pr-3">Cukor</th>
                    <th class="font-wight-bold pr-3">Kalória</th>
                    <th></th>
                    <th></th>
                <tbody>
                    <?php foreach ($foods as $food) : ?>
                        <tr class="food">
                            <td><?= $food["elelmiszer_neve"] ?></td>
                            <td><?= $food["feherje"] ?></td>
                            <td><?= $food["szenhidrat"] ?></td>
                            <td><?= $food["zsir"] ?></td>
                            <td><?= $food["cukor"] ?></td>
                            <td><?= $food["kaloria"] ?></td>
                            <td class="text-center-without-padding">
                                <button id="" class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal" onclick="setDeleteFoodId(<?= $food["id"] ?>)"></button>
                            </td>
                            <td class="text-center-without-padding">
                                <button id="" class="btn fa fa-pencil" onclick="navigateToModifyFood(<?= $food["id"] ?>)"></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <div class="modal rounded" id="delete-modal" data-backdrop="static" data-keyboard="false">
                <div class="modal-text font-weight-bold">
                    <p class="text-center mt-3">Biztosan törölni szeretné ezt az adatot?</p>
                </div>

                <div class="modal-footer">
                    <div class="row center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <button type="button" class="btn btn-danger btn-style" id="torol" data-dismiss="modal" onclick="deleteFood()">Igen</button>
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