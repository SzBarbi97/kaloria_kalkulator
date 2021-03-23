<?php
require_once("../database.php");

class UserModel
{

    public static function checkEmail($email)
    {
        $database = Database::getInstance();

        $sql = sprintf("SELECT count(*) as db FROM felhasznalo WHERE email = '%s'", $email);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function saveUser($nev, $email, $jelszo, $nem, $eletkor, $magassag, $testsuly, $bmr)
    {
        $database = Database::getInstance();

        $sql = sprintf(
            "INSERT INTO felhasznalo(teljes_nev, email, jelszo, nem, eletkor, magassag, testsuly, alapanyagcsere) "
                . "VALUES ('%s', '%s', '%s', '%s', %d, %d, %d, %f)",
            $nev,
            $email,
            md5($jelszo),
            $nem,
            $eletkor,
            $magassag,
            $testsuly,
            $bmr
        );

        return $database->query($sql);
    }

    public static function checkUser($email, $jelszo)
    {
        $database = Database::getInstance();

        $sql = sprintf("SELECT count(*) as db 
        FROM felhasznalo 
        WHERE email = '%s' AND jelszo = '%s'", $email, md5($jelszo));

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["db"];
    }

    public static function getCurrentUser()
    {
        $database = Database::getInstance();
        $email = $_SESSION["email"];

        $sql = sprintf("SELECT teljes_nev, nem, eletkor, magassag, testsuly, alapanyagcsere
        FROM felhasznalo
        WHERE email = '%s'", $email);

        $res = $database->query($sql);

        return $res->fetch_assoc();
    }

    public static function getCurrentUserId()
    {
        $database = Database::getInstance();
        $email = $_SESSION["email"];

        $sql = sprintf("SELECT id
        FROM felhasznalo 
        WHERE email = '%s'", $email);

        $res = $database->query($sql);

        $row = $res->fetch_assoc();

        return $row["id"];
    }

    public static function modifyBasicData($magassag, $testsuly, $eletkor, $bmr)
    {
        $database = Database::getInstance();
        $email = $_SESSION["email"];

        $sql = sprintf("UPDATE felhasznalo
        SET eletkor = '%d', magassag = '%d', testsuly = '%d', alapanyagcsere = '%f'
        WHERE email = '%s'", $eletkor, $magassag, $testsuly, $bmr, $email);

        $database->query($sql);
    }

    public static function modifyProfilData($teljesnev)
    {
        $database = Database::getInstance();
        $email = $_SESSION["email"];

        $sql = sprintf("UPDATE felhasznalo
        SET teljes_nev = '%s'
        WHERE email = '%s'", $teljesnev, $email);

        $database->query($sql);
    }

    public static function modifyPasswordData($jelszo)
    {
        $database = Database::getInstance();
        $email = $_SESSION["email"];

        $sql = sprintf("UPDATE felhasznalo
        SET jelszo = '%s'
        WHERE email = '%s'", md5($jelszo), $email);

        $database->query($sql);
    }
}
