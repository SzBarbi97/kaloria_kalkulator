<?php
require_once("../database.php");

class HistoryModel
{

    public static function getHistories()
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT datum, feherje, szenhidrat, zsir, cukor, kaloria, elegetett_kaloria
        FROM elozmeny
        WHERE user_id = '%d'
        ORDER BY datum DESC", $userId);

        $res = $database->query($sql);
        $histories = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $histories;
    }

    public static function checkDate($datum)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT count(*) AS db 
        FROM elozmeny
        WHERE user_id = '%d' AND datum = '%s'", $userId, $datum);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function insertDateToUser($datum)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "INSERT INTO elozmeny(user_id, datum, feherje, szenhidrat, zsir, cukor, kaloria, elegetett_kaloria)
            VALUES ('%d', '%s', 0, 0, 0, 0, 0, 0)",
            $userId,
            $datum
        );

        $database->query($sql);
    }

    public static function updateHistoryByFood($datum, $feherje, $szenhidrat, $zsir, $cukor, $kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "UPDATE elozmeny
            SET feherje = '%d', szenhidrat = '%d', zsir = '%d', cukor = '%d', kaloria = '%d'
            WHERE user_id = '%d' AND datum = '%s'",
            $feherje,
            $szenhidrat,
            $zsir,
            $cukor,
            $kaloria,
            $userId,
            $datum
        );

        $database->query($sql);
    }

    public static function updateHistoryByActivity($datum, $elegetett_kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "UPDATE elozmeny
            SET elegetett_kaloria = '%d'
            WHERE user_id = '%d' AND datum = '%s'",
            $elegetett_kaloria,
            $userId,
            $datum
        );

        $database->query($sql);
    }
}
