<?php
require "../model/food-model.php";

session_start();

header('Content-Type: application/json');

$foodId = $_POST["foodId"];

if ($foodId != -1) {
    FoodModel::deleteFood($foodId);
    print(json_encode(array("success" => true)));
}
