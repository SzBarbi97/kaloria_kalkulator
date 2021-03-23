<?php
require_once("../database.php");

class FoodModel
{
    public static function saveFood($elelmiszer_neve, $feherje, $szenhidrat, $zsir, $cukor, $kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "INSERT INTO etel(user_id, elelmiszer_neve, feherje, szenhidrat, zsir, cukor, kaloria) 
            VALUES ('%d', '%s', '%d', '%d', '%d', '%d', '%d')",
            $userId,
            $elelmiszer_neve,
            $feherje,
            $szenhidrat,
            $zsir,
            $cukor,
            $kaloria
        );

        $database->query($sql);
    }

    public static function checkFoodName($elelmiszer_neve)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT count(*) AS db 
        FROM etel
        WHERE user_id = '%d' AND elelmiszer_neve = '%s'", $userId, $elelmiszer_neve);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function getFoods()
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, elelmiszer_neve, feherje, szenhidrat, zsir, cukor, kaloria
        FROM etel
        WHERE user_id = '%d'", $userId);

        $res = $database->query($sql);
        $foods = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $foods;
    }

    public static function getFoodsNameWithId()
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, elelmiszer_neve
        FROM etel
        WHERE user_id = '%d'", $userId);

        $res = $database->query($sql);
        $foods = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $foods;
    }

    public static function getFoodById($foodId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT elelmiszer_neve, feherje, szenhidrat, zsir, cukor, kaloria
        FROM etel
        WHERE user_id = '%d' AND id = '%d'", $userId, $foodId);

        $res = $database->query($sql);
        $row = $res->fetch_assoc();

        return $row;
    }

    public static function deleteFood($foodId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("DELETE FROM etel
        WHERE user_id = '%d' AND id = '%d'", $userId, $foodId);

        $database->query($sql);
    }

    public static function modifyFood($foodId, $elelmiszer_neve, $feherje, $szenhidrat, $zsir, $cukor, $kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "UPDATE etel
        SET  elelmiszer_neve = '%s', feherje = '%d', szenhidrat = '%d', zsir = '%d', cukor = '%d', kaloria = '%d'
        WHERE user_id = '%d' AND id = '%d'",
            $elelmiszer_neve,
            $feherje,
            $szenhidrat,
            $zsir,
            $cukor,
            $kaloria,
            $userId,
            $foodId
        );

        $database->query($sql);
    }
}
