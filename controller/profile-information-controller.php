<?php
require "../model/user-model.php";

session_start();

header('Content-Type: application/json');

$email = $_SESSION["email"];
$teljesnev = $_POST["teljesnev"];
$jelszo = $_POST["jelszo"];

$userDb = UserModel::checkUser($email, $jelszo);

if ($userDb == 1) {
    UserModel::modifyProfilData($teljesnev);
    print(json_encode(array("success" => true)));
} else {
    print(json_encode(array("success" => false)));
}
