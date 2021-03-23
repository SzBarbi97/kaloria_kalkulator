<?php
require "../model/user-model.php";

header('Content-Type: application/json');

$email = $_POST["email"];
$jelszo = $_POST["jelszo"];

$userDb = UserModel::checkUser($email, $jelszo);

if ($userDb == 1) {
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["userId"] = UserModel::getCurrentUserId();
    print(json_encode(array("success" => true)));
} else {
    print(json_encode(array("success" => false)));
}
