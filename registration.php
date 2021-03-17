<form id="registration-form">
    <div class="form-group mt-3">
        <label for="nev">Név</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-user" aria-hidden="true"></i>
            </span>
            <input type="text" class="form-control input-field" id="nev">
        </div>
        <div class="invalid-feedback" id="nevHiba"></div>
    </div>

    <div class="form-group">
        <label for="email">Email cím</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            <input type="email" class="form-control input-field" id="email">
        </div>
        <div class="invalid-feedback" id="emailHiba"></div>
    </div>

    <div class="form-group">
        <label for="jelszo">Jelszó</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            <input type="password" class="form-control input-field" id="jelszo">
        </div>
        <div class="invalid-feedback" id="jelszoHiba"></div>
    </div>

    <div class="form-group">
        <label for="jelszo-ujra">Jelszó újra</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            <input type="password" class="form-control input-field" id="jelszo-ujra">
        </div>
        <div class="invalid-feedback" id="jelszoUjraHiba"></div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="nem">
                <option selected>Nem</option>
                <option value="Nő">Nő</option>
                <option value="Férfi">Férfi</option>
            </select>
            <div class="invalid-feedback" id="nemHiba"></div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="eletkor">
                <option selected>Életkor</option>
                <?php
                for ($ev = 1; $ev < 100; $ev++) {
                    echo "<option value=" . $ev . ">$ev</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback" id="eletkorHiba"></div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="magassag">
                <option selected>Magasság</option>
                <?php
                for ($magassag = 1; $magassag <= 250; $magassag++) {
                    echo "<option value=" . $magassag . ">$magassag cm</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback" id="magassagHiba"></div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3 mb-3 center">
            <select class="custom-select" id="testsuly">
                <option selected>Testsúly</option>
                <?php
                for ($testsuly = 1; $testsuly <= 300; $testsuly++) {
                    echo "<option value=" . $testsuly . ">$testsuly kg</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback" id="testsulyHiba"></div>
        </div>
    </div>

    <div class="custom-control custom-checkbox text-left">
        <input type="checkbox" class="custom-control-input" id="adatvedelmi">
        <label class="custom-control-label" id="adatvedelmi-label" for="adatvedelmi"></label>
        <span>Az <a type="button" class="link" id="adatvedelmi" data-toggle="modal" data-target="#adatvedelmi-tajekoztato">adatvédelmi tájékoztató</a> tartalmát megismertem és azt elfogadom.</span>
        <div class="invalid-feedback" id="adatvedelmiHiba"></div>
    </div>

    <button type="button" class="btn btn-primary btn-style mt-3 mb-3" id="registration" onclick="userRegistration()">Regisztráció</button>
</form>

<?php require_once("privacy-notice.php"); ?>