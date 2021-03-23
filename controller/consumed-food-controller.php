<?php
require_once("../model/consumed-food-model.php");

session_start();

header('Content-Type: application/json');

$datum = $_POST["datum"];
$elelmiszerNeve = $_POST["elelmiszerNeve"];
$mennyiseg = $_POST["mennyiseg"];
$feherje = $_POST["feherje"];
$szenhidrat = $_POST["szenhidrat"];
$zsir = $_POST["zsir"];
$cukor = $_POST["cukor"];
$kaloria = $_POST["kaloria"];

ConsumedFoodModel::saveConsumedFood($datum, $elelmiszerNeve, $mennyiseg, $feherje, $szenhidrat, $zsir, $cukor, $kaloria);

require_once("./history-food-update-controller.php");

print(json_encode(array("success" => true)));
