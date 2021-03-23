<?php
require "../model/completed-sport-model.php";

session_start();

header('Content-Type: application/json');

$completedSportId = $_POST["completedSportId"];

if ($completedSportId != -1) {
    CompletedSportModel::deleteCompletedSport($completedSportId);
    require_once("./history-activity-update-controller.php");
    print(json_encode(array("success" => true)));
}
