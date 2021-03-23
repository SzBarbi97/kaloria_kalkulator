<?php
require_once("../model/history-model.php");

$datum = $_POST["datum"];

$userDb = HistoryModel::checkDate($datum);
if ($userDb != 1) {
    HistoryModel::insertDateToUser($datum);
}

$completedSports = CompletedSportModel::getCompletedSportsByDate($datum);

$elegetettKaloriaOsszesen = 0;
foreach ($completedSports as $completedSport) :
    $elegetettKaloriaOsszesen += $completedSport["elegetett_kaloria"];
endforeach;

HistoryModel::updateHistoryByActivity($datum, $elegetettKaloriaOsszesen);
