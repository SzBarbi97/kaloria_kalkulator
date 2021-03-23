<?php
require "../model/completed-sport-model.php";

session_start();

header('Content-Type: application/json');

$datum = $_POST["datum"];
$mozgasformaNeve = $_POST["mozgasformaNeve"];
$sportoltIdo = $_POST["sportoltIdo"];
$elegetettKaloria = $_POST["elegetettKaloria"];

CompletedSportModel::saveCompletedSport($datum, $mozgasformaNeve, $sportoltIdo, $elegetettKaloria);

require_once("./history-activity-update-controller.php");

print(json_encode(array("success" => true)));
