<?php
require_once("../database.php");

class ActivityModel
{
    public static function saveActivity($mozgasforma_neve, $elegetett_kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf(
            "INSERT INTO mozgasforma(user_id, mozgasforma_neve, elegetett_kaloria) 
            VALUES ('%d', '%s', '%d')",
            $userId,
            $mozgasforma_neve,
            $elegetett_kaloria
        );

        $database->query($sql);
    }

    public static function checkActivityName($mozgasforma_neve)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT count(*) AS db 
        FROM mozgasforma
        WHERE user_id = '%d' AND mozgasforma_neve = '%s'", $userId, $mozgasforma_neve);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function getActivities()
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, mozgasforma_neve, elegetett_kaloria
        FROM mozgasforma
        WHERE user_id = '%d'", $userId);

        $res = $database->query($sql);
        $activities = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $activities;
    }

    public static function getActivitiesNameWithId()
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT id, mozgasforma_neve
        FROM mozgasforma
        WHERE user_id = '%d'", $userId);

        $res = $database->query($sql);
        $activities = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();

        return $activities;
    }

    public static function getActivityById($activityId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("SELECT mozgasforma_neve, elegetett_kaloria
        FROM mozgasforma
        WHERE user_id = '%d' AND id = '%d'", $userId, $activityId);

        $res = $database->query($sql);
        $row = $res->fetch_assoc();

        return $row;
    }

    public static function deleteActivity($activityId)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("DELETE FROM mozgasforma
        WHERE user_id = '%d' AND id = '%d'", $userId, $activityId);

        $database->query($sql);
    }

    public static function modifyActivity($activityId, $mozgasforma_neve, $elegetett_kaloria)
    {
        $database = Database::getInstance();

        $userId = $_SESSION["userId"];

        $sql = sprintf("UPDATE mozgasforma
        SET mozgasforma_neve = '%s', elegetett_kaloria = '%d'
        WHERE user_id = '%d' AND id = '%d'", $mozgasforma_neve, $elegetett_kaloria, $userId, $activityId);

        $database->query($sql);
    }
}
