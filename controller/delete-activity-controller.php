<?php
require "../model/activity-model.php";

session_start();

header('Content-Type: application/json');

$activityId = $_POST["activityId"];

if ($activityId != -1) {
    ActivityModel::deleteActivity($activityId);
    print(json_encode(array("success" => true)));
}
