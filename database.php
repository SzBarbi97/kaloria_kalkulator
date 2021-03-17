<?php
class Database extends mysqli
{
    private static $instance = null;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        @parent::__construct('localhost', 'root', '', 'kaloria_kalkulator', 3306, false);
        @parent::set_charset("utf8");
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
