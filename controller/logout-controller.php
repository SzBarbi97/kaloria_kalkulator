<?php

header('Content-Type: application/json');

session_start();
session_destroy();

print(json_encode(array("success" => true)));
