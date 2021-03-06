<?php
require "../database.php";

class UserModel
{

    public static function checkEmail($email)
    {
        $database = Database::getInstance();

        $sql = sprintf("SELECT count(*) as db FROM user WHERE email = '%s'", $email);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function saveUser($nev, $email, $jelszo, $nem, $eletkor, $magassag, $testsuly)
    {
        $database = Database::getInstance();

        $sql = sprintf("INSERT INTO felhasznalo(teljes_nev, email, jelszo, nem, eletkor, magassag, testsuly) "
            . "VALUES ('%s', '%s', '%s', '%s', %d, %d, %d)", $nev, $email, md5($jelszo), $nem, $eletkor, $magassag, $testsuly);

        return $database->query($sql);
    }

    public static function checkUser($email, $jelszo)
    {
        $database = Database::getInstance();

        $sql = sprintf("SELECT count(*) as db FROM felhasznalo WHERE email = '%s' AND jelszo = '%s'", $email, md5($jelszo));

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }
}
