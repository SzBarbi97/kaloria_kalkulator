<?php
require "../model/user-model.php";

session_start();

header('Content-Type: application/json');

$magassag = $_POST["magassag"];
$testsuly = $_POST["testsuly"];
$eletkor = $_POST["eletkor"];
$bmr = $_POST["bmr"];

UserModel::modifyBasicData($magassag, $testsuly, $eletkor, $bmr);
