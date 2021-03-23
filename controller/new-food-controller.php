<?php
require "../model/food-model.php";

session_start();

header('Content-Type: application/json');

$termekNeve = $_POST["termekNeve"];
$feherje = $_POST["feherje"];
$szenhidrat = $_POST["szenhidrat"];
$zsir = $_POST["zsir"];
$cukor = $_POST["cukor"];
$kaloria = $_POST["kaloria"];

$db = FoodModel::checkFoodName($termekNeve);

if ($db == 0) {
    FoodModel::saveFood($termekNeve, $feherje, $szenhidrat, $zsir, $cukor, $kaloria);
    print(json_encode(array("success" => true)));
} else {
    print(json_encode(array("success" => false, "error" => "termekNeve")));
}
