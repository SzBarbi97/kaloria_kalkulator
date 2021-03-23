<?php
require_once("../model/history-model.php");

$datum = $_POST["datum"];

$userDb = HistoryModel::checkDate($datum);
if ($userDb != 1) {
    HistoryModel::insertDateToUser($datum);
}

$consumedFoods = ConsumedFoodModel::getConsumedFoodsByDate($datum);

$feherjeOsszesen = 0;
$szenhidratOsszesen = 0;
$zsirOsszesen = 0;
$cukorOsszesen = 0;
$kaloriaOsszesen = 0;
foreach ($consumedFoods as $consumedFood) :
    $feherjeOsszesen += $consumedFood["feherje"];
    $szenhidratOsszesen += $consumedFood["szenhidrat"];
    $zsirOsszesen += $consumedFood["zsir"];
    $cukorOsszesen += $consumedFood["cukor"];
    $kaloriaOsszesen += $consumedFood["kaloria"];
endforeach;

HistoryModel::updateHistoryByFood($datum, $feherjeOsszesen, $szenhidratOsszesen, $zsirOsszesen, $cukorOsszesen, $kaloriaOsszesen);
