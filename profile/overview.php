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
                <p>165 cm</p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Testsúly:</p>
            </div>
            <div class="col-6">
                <p>65 kg</p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Életkor:</p>
            </div>
            <div class="col-6">
                <p>23 éves</p>
            </div>
            <div class="col-6 text-right">
                <p class="font-weight-bold">Alapanyagcsere:</p>
            </div>
            <div class="col-6">
                <p>2000 kcal</p>
            </div>
        </div>
    </div>
    <div class="container center text-center mt-5">
        <div class="row">
            <div class="col-2 col-md-4 col-xl-5 text-right">
                <button class="btn fa fa-arrow-left color-white" onclick="changeDaysBy(-1)"></button>
            </div>
            <div class="col-8 col-md-4 col-xl-2">
                <h3 class="text-center text-white font-weight-bold" id="overviewDate">
                    <?php
                    $date = strtotime("today");
                    echo date("Y-m-d", $date) . "<br>";
                    ?>
                </h3>
            </div>
            <div class="col-2 col-md-4 col-xl-5 text-left">
                <button class="btn fa fa-arrow-right color-white" onclick="changeDaysBy(1)"></button>
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
                            <option value="Tej">Tej</option>
                            <option value="Sajt">Sajt</option>
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
                        <p>0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Szénhidrát:</p>
                    </div>
                    <div class="col-6">
                        <p>0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Zsír:</p>
                    </div>
                    <div class="col-6">
                        <p>0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Cukor:</p>
                    </div>
                    <div class="col-6">
                        <p>0 g</p>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Kalória:</p>
                    </div>
                    <div class="col-6">
                        <p>0 g</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad" onclick="overviewEtel()">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="elelmiszerhezNavigal" href="new-food.php">Nem találtad az általad fogyasztott terméket?</a>
        </div>

        <h3 class="mt-5 font-italic text-center font-weight-bold">Napi összegző</h3>

        <div class="container table d-flex justify-content-center">
            <table>
                <thead>
                    <th class="font-wight-bold pr-3">Élelmiszer</th>
                    <th class="font-wight-bold pr-3">Fehérje</th>
                    <th class="font-wight-bold pr-3">Szénhidrát</th>
                    <th class="font-wight-bold pr-3">Zsír</th>
                    <th class="font-wight-bold pr-3">Cukor</th>
                    <th class="font-wight-bold">Kalória</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr class="food">
                        <td>Tej</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td class="text-center-without-padding">
                            <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr class="food">
                        <td>Szörp</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td class="text-center-without-padding">
                            <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr class="food">
                        <td>Limonádé</td>
                        <td>15g</td>
                        <td>11g</td>
                        <td>12g</td>
                        <td>11g</td>
                        <td>19g</td>
                        <td class="text-center-without-padding">
                            <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr class="food">
                        <td>Kakaó</td>
                        <td>50g</td>
                        <td>70g</td>
                        <td>21g</td>
                        <td>11g</td>
                        <td>32g</td>
                        <td class="text-center-without-padding">
                            <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="border-top-2 font-weight-bold">
                    <tr class="food-sum">
                        <td>Összesen</td>
                        <td>50g</td>
                        <td>70g</td>
                        <td>21g</td>
                        <td>11g</td>
                        <td>32g</td>
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
                            <option value="Súlyzós edzés">Súlyzós edzés</option>
                            <option value="Futás">Futás</option>
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
                        <p class="d-inline-block">0 kcal</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad" onclick="overviewSport()">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="tevekenyseghezNavigal" href="new-activitie.php">Nem találtad az általad végzett edzésformát?</a>
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
                    <tr class="activities">
                        <td>Futás</td>
                        <td>60 perc</td>
                        <td>300 kcal</td>
                        <td class="text-center-without-padding">
                            <button class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="border-top-2 font-weight-bold">
                    <tr class="activities-sum">
                        <td class="text-center-without-padding">Összesen</td>
                        <td>60 perc</td>
                        <td>300 kcal</td>
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