<?php
require "../model/activity-model.php";

session_start();

header('Content-Type: application/json');

$tevekenysegNeve = $_POST["tevekenysegNeve"];
$elegetettKaloria = $_POST["elegetettKaloria"];
$activityId = $_POST["activityId"];

ActivityModel::modifyActivity($activityId, $tevekenysegNeve, $elegetettKaloria);
print(json_encode(array("success" => true)));
