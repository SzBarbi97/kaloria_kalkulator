<?php
require_once("../database.php");

class CompletedSportModel
{
    public static function saveCompletedSport($datum, $mozgasforma_neve, $sportolt_ido, $elegetett_kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "INSERT INTO elvegzett_mozgasforma(user_id, datum, mozgasforma_neve, sportolt_ido, elegetett_kaloria) 
            VALUES ('%d', '%s', '%s', '%d', '%d')",
            $userId,
            $datum,
            $mozgasforma_neve,
            $sportolt_ido,
            $elegetett_kaloria
        );

        $database->query($sql);
    }

    public static function getCompletedSportsByDate($datum)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, mozgasforma_neve, sportolt_ido, elegetett_kaloria
        FROM elvegzett_mozgasforma
        WHERE user_id = '%d' AND datum = '%s'", $userId, $datum);

        $res = $database->query($sql);
        $consumedFoods = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $consumedFoods;
    }

    public static function deleteCompletedSport($completedSportId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("DELETE FROM elvegzett_mozgasforma
        WHERE user_id = '%d' AND id = '%d'", $userId, $completedSportId);

        $database->query($sql);
    }
}
