<?php
require "../model/user-model.php";

session_start();

header('Content-Type: application/json');

$email = $_SESSION["email"];
$regijelszo = $_POST["regijelszo"];
$ujjelszo = $_POST["ujjelszo"];

$userDb = UserModel::checkUser($email, $regijelszo);

if ($userDb == 1) {
    $save = UserModel::modifyPasswordData($ujjelszo);
    print(json_encode(array("success" => true)));
} else {
    print(json_encode(array("success" => false)));
}
