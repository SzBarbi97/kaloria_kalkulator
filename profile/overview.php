<!DOCTYPE html>
<html lang="hu">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/overview.js"></script>
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
            <div class="col-12 col-sm-3 text-center center">
                <p>Magasság</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>Testsúly</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>Életkor</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>Alapanyagcsere</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-3 text-center center">
                <p>50 cm</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>50 kg</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>50 éves</p>
            </div>
            <div class="col-12 col-sm-3 text-center center">
                <p>2000 kcal</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <input type="date" value="2021-01-10" min="2021-01-10" max="2022-12-31">
    </div>

    <div class="container rounded center bg-white border mt-5">

        <p class="mt-2 text-center font-italic font-weight-bold">Mit ettél?</p>

        <div class="row mt-2 mr-2 ml-2 font-weight-bold">
            <div class="col-12 col-sm-6">
                <select class="custom-select" id="nem">
                    <option selected>Ételek</option>
                    <option value="Tej">Tej</option>
                    <option value="Sajt">Sajt</option>
                </select>
            </div>
            <div class="col-10 col-sm-5">
                <input type="text" class="form-control input-field" id="fogyasztottMennyiseg">
            </div>
            <div class="col-1 col-sm-1">
                <p>g</p>
            </div>
        </div>

        <div class="container table mt-5 d-flex justify-content-center">
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
                    <tr>
                        <td>Tej</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="elelmiszerhezNavigal">Nem találtad az általad fogyasztott terméket?</a>
        </div>

        <p class="mt-3 font-italic text-center font-weight-bold">Napi összegző</p>

        <div class="container table mt-5 d-flex justify-content-center">
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
                    <tr>
                        <td>Tej</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>10g</td>
                        <td>
                            <button id="" class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Szörp</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>11g</td>
                        <td>
                            <button id="" class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Limonádé</td>
                        <td>15g</td>
                        <td>11g</td>
                        <td>12g</td>
                        <td>11g</td>
                        <td>19g</td>
                        <td>
                            <button id="" class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Kakaó</td>
                        <td>50g</td>
                        <td>70g</td>
                        <td>21g</td>
                        <td>11g</td>
                        <td>32g</td>
                        <td>
                            <button id="" class="btn fa fa-trash color-red" data-toggle="modal" data-target="#delete-modal"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="container rounded center bg-white border mt-5 mb-5">

        <p class="font-italic text-center font-weight-bold mt-2">Mit sportoltál?</p>

        <div class="row mt-2 mr-2 ml-2 font-weight-bold">
            <div class="col-12 col-sm-6">
                <select class="custom-select" id="nem">
                    <option selected>Mozgásformák</option>
                    <option value="Súlyzós edzés">Súlyzós edzés</option>
                    <option value="Futás">Futás</option>
                </select>
            </div>
            <div class="col-10 col-sm-5">
                <input type="text" class="form-control input-field" id="spotoltido">
            </div>
            <div class="col-1 col-sm-1">
                <p>perc</p>
            </div>
        </div>

        <div class="text-center mt-2 font-weight-bold">
            <p>Elégetett kalória: 300 kcal</p>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-success btn-style" id="hozzaad">Hozzáad</button>
        </div>

        <div class="mt-3 text-center">
            <a type="button" class="link" id="tevekenyseghezNavigal">Nem találtad az általad végzett edzésformát?</a>
        </div>

        <p class="mt-3 font-italic text-center font-weight-bold">Napi összegző</p>

        <div class="row mt-2 mr-2 ml-2">
            <div class="col-11">
                <div class="row font-weight-bold">
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>Mozgásforma neve</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>sportolt idő(perc)</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>Elégetett kalória</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mr-2 ml-2">
            <div class="col-11">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>Futás</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>60 perc</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 text-center center">
                        <p>300 kcal</p>
                    </div>
                </div>
            </div>

            <div class="col-1">
                <div class="row">
                    <div class="col-12 mb-3">
                        <button type="button" class="btn" id="delete" data-toggle="modal" data-target="#delete-modal">
                            <span class="icon">
                                <i class="fa fa-trash color-red" aria-hidden="true"></i>
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