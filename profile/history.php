<?php
require_once("../model/history-model.php");

session_start();

$histories = HistoryModel::getHistories();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/history.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/history.css">
</head>

<body class="background">
    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Előzmények</h1>
    </div>

    <div class="container rounded center bg-white border mt-5 mb-5">

        <div class="table mt-4 d-flex justify-content-center">
            <table>
                <thead>
                    <th class="font-wight-bold pr-3">Dátum</th>
                    <th class="font-wight-bold pr-3">Fehérje</th>
                    <th class="font-wight-bold pr-3">Szénhidrát</th>
                    <th class="font-wight-bold pr-3">Zsír</th>
                    <th class="font-wight-bold pr-3">Cukor</th>
                    <th class="font-wight-bold pr-3">Kalória</th>
                    <th class="font-wight-bold pr-3">Elégetett kalória</th>
                <tbody>
                    <?php foreach ($histories as $history) : ?>
                        <tr class="history">
                            <td><?= $history["datum"] ?></td>
                            <td><?= $history["feherje"] . ' g' ?></td>
                            <td><?= $history["szenhidrat"] . ' g' ?></td>
                            <td><?= $history["zsir"] . ' g' ?></td>
                            <td><?= $history["cukor"] . ' g' ?></td>
                            <td><?= $history["kaloria"] . ' kcal' ?></td>
                            <td><?= $history["elegetett_kaloria"] . ' kcal' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>