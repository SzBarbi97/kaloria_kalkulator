<?php
require "../model/activity-model.php";

session_start();

header('Content-Type: application/json');

$activityId = $_POST["activityId"];

$activity = ActivityModel::getActivityById($activityId);
print(json_encode(array(
    "success" => true,
    "elegetettKaloria" => $activity["elegetett_kaloria"],
)));
