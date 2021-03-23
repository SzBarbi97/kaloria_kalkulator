<?php
require_once("../database.php");

class ConsumedFoodModel
{
    public static function saveConsumedFood($datum, $elelmiszerNeve, $mennyiseg, $feherje, $szenhidrat, $zsir, $cukor, $kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "INSERT INTO elfogyasztott_etel(user_id, datum, elelmiszer_neve, mennyiseg, feherje, szenhidrat, zsir, cukor, kaloria) 
            VALUES ('%d', '%s', '%s', '%d', '%d', '%d', '%d', '%d', '%d')",
            $userId,
            $datum,
            $elelmiszerNeve,
            $mennyiseg,
            $feherje,
            $szenhidrat,
            $zsir,
            $cukor,
            $kaloria
        );

        $database->query($sql);
    }

    public static function getConsumedFoodsByDate($datum)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, elelmiszer_neve, mennyiseg, feherje, szenhidrat, zsir, cukor, kaloria
        FROM elfogyasztott_etel
        WHERE user_id = '%d' AND datum = '%s'", $userId, $datum);

        $res = $database->query($sql);
        $consumedFoods = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $consumedFoods;
    }

    public static function deleteConsumedFood($consumedFoodId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("DELETE FROM elfogyasztott_etel
        WHERE user_id = '%d' AND id = '%d'", $userId, $consumedFoodId);

        $database->query($sql);
    }
}
