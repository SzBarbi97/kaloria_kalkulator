<?php
require "../model/activity-model.php";

session_start();

header('Content-Type: application/json');

$tevekenysegNeve = $_POST["tevekenysegNeve"];
$elegetettKaloria = $_POST["elegetettKaloria"];

$db = ActivityModel::checkActivityName($tevekenysegNeve);

if ($db == 0) {
    ActivityModel::saveActivity($tevekenysegNeve, $elegetettKaloria);
    print(json_encode(array("success" => true)));
} else {
    print(json_encode(array("success" => false, "error" => "tevekenysegNeve")));
}
