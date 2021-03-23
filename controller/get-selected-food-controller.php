<?php
require "../model/food-model.php";

session_start();

header('Content-Type: application/json');

$foodId = $_POST["foodId"];

$food = FoodModel::getFoodById($foodId);
print(json_encode(array(
    "success" => true,
    "feherje" => $food["feherje"],
    "szenhidrat" => $food["szenhidrat"],
    "zsir" => $food["zsir"],
    "cukor" => $food["cukor"],
    "kaloria" => $food["kaloria"],
)));
