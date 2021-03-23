<?php
require_once("../model/user-model.php");
require_once("../model/food-model.php");
require_once("../model/activity-model.php");
require_once("../model/consumed-food-model.php");
require_once("../model/completed-sport-model.php");

session_start();

$date;
$day;
if (isset($_GET["day"]) && is_numeric($_GET["day"]) && $_GET["day"] < 0) {
    $date = date('Y-m-d', strtotime('today' . $_GET["day"] . ' days'));
    $day = $_GET["day"];
} else {
    $date = date('Y-m-d', strtotime('today'));
    $day = 0;
}

$currentUser = UserModel::getCurrentUser();
$foods = FoodModel::getFoodsNameWithId();
$activities = ActivityModel::getActivitiesNameWithId();
$consumedFoods = ConsumedFoodModel::getConsumedFoodsByDate($date);
$completedSports = CompletedSportModel::getCompletedSportsByDate($date);

$mennyisegOsszesen = 0;
$feherjeOsszesen = 0;
$szenhidratOsszesen = 0;
$zsirOsszesen = 0;
$cukorOsszesen = 0;
$kaloriaOsszesen = 0;
foreach ($consumedFoods as $consumedFood) :
    $mennyisegOsszesen += $consumedFood["mennyiseg"];
    $feherjeOsszesen += $consumedFood["feherje"];
    $szenhidratOsszesen += $consumedFood["szenhidrat"];
    $zsirOsszesen += $consumedFood["zsir"];
    $cukorOsszesen += $consumedFood["cukor"];
    $kaloriaOsszesen += $consumedFood["kaloria"];
endforeach;

$idoOsszesen = 0;
$elegetettKaloriaOsszesen = 0;
foreach ($completedSports as $completedSport) :
    $idoOsszesen += $completedSport["sportolt_ido"];
    $elegetettKaloriaOsszesen += $completedSport["elegetett_kaloria"];
endforeach;

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/overview.js"></script>
    <script src="../assets/js/new-food.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/overview.css">
</head>

<body class="background">

    <?php require_once("navbar.php"); ?>

    <div class="text-white mt-5">
        <h1 class="text-center font-weight-bold">Áttekintés</h1>
    </div>

    <div class="container rounded center bg-white border mt-5">
        <div class="row mt-2 font-weight-bold">
            <div class="col-6 text-right">
                <p class="font-weight-bold">Magasság:</p>
            </div>
            <div class="col-6">
                <p><?php echo $currentUser["magassag"] . ' cm' ?></p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Testsúly:</p>
            </div>
            <div class="col-6">
                <p><?php echo $currentUser["testsuly"] . ' kg' ?></p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Életkor:</p>
            </div>
            <div class="col-6">
                <p><?php echo $currentUser["eletkor"] . ' éves' ?></p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Alapanyagcsere:</p>
            </div>
            <div class="col-6">
                <p><?php echo $currentUser["alapanyagcsere"] . ' kcal' ?></p>
            </div>
        </div>
    </div>
    <div class="container center text-center mt-5">
        <div class="row">
            <div class="col-2 col-md-4 col-xl-5 text-right">
                <button class="btn fa fa-arrow-left color-white" onclick="changeDaysBy(<?php echo $day - 1 ?>)"></button>
            </div>
            <div class="col-8 col-md-4 col-xl-2">
                <h3 class="text-center text-white font-weight-bold" id="overviewDate">
                    <?php echo $date . "<br>"; ?>
                </h3>
            </div>
            <div class="col-2 col-md-4 col-xl-5 text-left">
                <button class="btn fa fa-arrow-right color-white" onclick="changeDaysBy(<?php echo $day + 1 ?>)"></button>
            </div>
        </div>
    </div>
    <div class="container rounded center bg-white border mt-5">

        <h3 class="mt-2 text-center font-italic font-weight-bold">Mit ettél?</h3>

        <div class="row mr-2 ml-2">
            <div class="col-12 col-sm-6 mt-2">
                <div class="row">
                    <div class="col-12">
                        <p class="font-weight-bold">Étel neve</p>
                    </div>
                    <div class="col-12">
                        <select class="custom-select" id="etelek">
                            <option selected>Ételek</option>
                            <?php foreach ($foods as $food) : ?>
                                <option value="<?= $food["id"] ?>"><?= $food["elelmiszer_neve"] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback" id="etelHiba"></div>
                    </div>
                    <div class="col-12 mt-3">
                        <p class="font-weight-bold">Mennyiség (grammban)</p>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control input-field" id="fogyasztottMennyiseg">
                        <div class="invalid-feedback" id="fogyasztottMennyisegHiba"></div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6 mt-2 pl-5">
                <div class="row">
                    <div class="col-6">
                        <p class="font-weight-bold">Fehérje:</p>
                    </div>
                    <div class="col-6">
                        <p id="kivalasztott-etel-feherje">0 g</p>
                    </div>
                    <div class=" col-6">
                        <p class="font-weight-bold">Szénhidrát:</p>
                    </div>
                    <div class="col-6">
                        <p id="kivalasztott-etel-szenhidrat">0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Zsír:</p>
                    </div>
                    <div class="col-6">
                        <p id="kivalasztott-etel-zsir">0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Cukor:</p>
                    </div>
                    <div class="col-6">
                        <p id="kivalasztott-etel-cukor">0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Kalória:</p>
                    </div>
                    <div class="col-6">
                        <p id="kivalasztott-etel-kaloria">0 kcal</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad" onclick="addFood()">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="elelmiszerhezNavigal" href="new-food.php">Nem találtad az általad fogyasztott terméket?</a>
        </div>

        <h3 class="mt-5 font-italic text-center font-weight-bold">Napi összegző</h3>

        <div class="container table d-flex justify-content-center">
            <table>
                <thead>
                    <th class="font-wight-bold pr-3">Élelmiszer</th>
                    <th class="font-wight-bold pr-3">Mennyiség</th>
                    <th class="font-wight-bold pr-3">Fehérje</th>
                    <th class="font-wight-bold pr-3">Szénhidrát</th>
                    <th class="font-wight-bold pr-3">Zsír</th>
                    <th class="font-wight-bold pr-3">Cukor</th>
                    <th class="font-wight-bold">Kalória</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($consumedFoods as $consumedFood) : ?>
                        <tr class="food">
                            <td><?= $consumedFood["elelmiszer_neve"] ?></td>
                            <td><?= $consumedFood["mennyiseg"] . ' g' ?></td>
                            <td><?= $consumedFood["feherje"] . ' g' ?></td>
                            <td><?= $consumedFood["szenhidrat"] . ' g' ?></td>
                            <td><?= $consumedFood["zsir"] . ' g' ?></td>
                            <td><?= $consumedFood["cukor"] . ' g' ?></td>
                            <td><?= $consumedFood["kaloria"] . ' kcal' ?> </td>
                            <td class="text-center-without-padding">
                                <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal" onclick="setDeleteIds(<?= $consumedFood["id"] ?>, -1)"></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="border-top-2 font-weight-bold">
                    <tr class="food-sum">
                        <td>Összesen</td>
                        <td><?php echo $mennyisegOsszesen . ' g' ?></td>
                        <td><?php echo $feherjeOsszesen . ' g' ?></td>
                        <td><?php echo $szenhidratOsszesen . ' g' ?></td>
                        <td><?php echo $zsirOsszesen . ' g' ?></td>
                        <td><?php echo $cukorOsszesen . ' g' ?></td>
                        <td><?php echo $kaloriaOsszesen . ' kcal' ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

    <div class="container rounded center bg-white border mt-5 mb-5">

        <h3 class="font-italic text-center font-weight-bold mt-2">Mit sportoltál?</h3>

        <div class="row mr-2 ml-2">
            <div class="col-12 mt-2">
                <div class="row text-center">
                    <div class="col-12">
                        <p class="font-weight-bold">Mozgásforma neve</p>
                    </div>
                    <div class="col-12">
                        <select class="custom-select" id="edzesforma">
                            <option selected>Mozgásformák</option>
                            <?php foreach ($activities as $activity) : ?>
                                <option value="<?= $activity["id"] ?>"><?= $activity["mozgasforma_neve"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="invalid-feedback" id="edzesformaHiba"></div>

                    <div class="col-12 mt-3">
                        <p class="font-weight-bold">Sportolt idő (percben)</p>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control input-field" id="sportoltido">
                        <div class="invalid-feedback" id="idoHiba"></div>
                    </div>

                    <div class="col-12 mt-3">
                        <p class="font-weight-bold d-inline-block">Elégetett kalória: </p>
                        <p class="d-inline-block" id="kivalasztott-sport-elegetett-kaloria">0 kcal</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad" onclick="addSport()">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="tevekenyseghezNavigal" href="new-activity.php">Nem találtad az általad végzett edzésformát?</a>
        </div>

        <h3 class="mt-5 font-italic text-center font-weight-bold">Napi összegző</h3>

        <div class="container table d-flex justify-content-center">
            <table>
                <thead>
                    <th class="font-wight-bold pr-3">Mozgásforma neve</th>
                    <th class="font-wight-bold pr-3">Sportolt idő (perc)</th>
                    <th class="font-wight-bold pr-3">Elégetett kalória</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($completedSports as $completedSport) : ?>
                        <tr class="activities">
                            <td><?= $completedSport["mozgasforma_neve"] ?></td>
                            <td><?= $completedSport["sportolt_ido"] . ' perc' ?></td>
                            <td><?= $completedSport["elegetett_kaloria"] . ' kcal' ?></td>
                            <td class="text-center-without-padding">
                                <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal" onclick="setDeleteIds(-1, <?= $completedSport["id"] ?>)"></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="border-top-2 font-weight-bold">
                    <tr class="activities-sum">
                        <td class="text-center-without-padding">Összesen</td>
                        <td><?php echo $idoOsszesen . ' perc' ?></td>
                        <td><?php echo $elegetettKaloriaOsszesen . ' kcal' ?></td>
                        <td></td>
                    </tr>
                </tfoot>
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
                            <button type="button" class="btn btn-danger btn-style" id="torol" data-dismiss="modal" onclick="deleteBySelectedId()">Igen</button>
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