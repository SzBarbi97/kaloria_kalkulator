<?php
require "../model/consumed-food-model.php";

session_start();

header('Content-Type: application/json');

$consumedFoodId = $_POST["consumedFoodId"];

if ($consumedFoodId != -1) {
    ConsumedFoodModel::deleteConsumedFood($consumedFoodId);
    require_once("./history-food-update-controller.php");
    print(json_encode(array("success" => true)));
}
