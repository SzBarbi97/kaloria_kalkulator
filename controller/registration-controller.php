<?php
require "../model/user-model.php";

header('Content-Type: application/json');

$nev = $_POST["nev"];
$email = $_POST["email"];
$jelszo = $_POST["jelszo"];
$nem = $_POST["nem"];
$eletkor = $_POST["eletkor"];
$magassag = $_POST["magassag"];
$testsuly = $_POST["testsuly"];

$emailDb = UserModel::checkEmail($email);

if ($emailDb > 0) {
    print(json_encode(array("success" => false, "error" => "email")));
} else {
    $save = UserModel::saveUser($nev, $email, $jelszo, $nem, $eletkor, $magassag, $testsuly);
    print(json_encode(array("success" => true)));
}
