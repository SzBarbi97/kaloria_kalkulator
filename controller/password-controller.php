<?php
require "../model/user-model.php";

session_start();

$jelszo = $_POST["jelszo"];

$userDb = UserModel::checkUser($email, $jelszo);
