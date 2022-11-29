<?php

class DatabaseConnection{
    public static $connection;
    private function __construct(){}

    public static function defineTraits($h, $u, $p, $d){
        DatabaseConnection::$connection = new mysqli($h, $u, $p, $d);
    }
    public static function getInstance(){
        return DatabaseConnection::$connection;
    }
}
DatabaseConnection::defineTraits("localhost", "pexdark", "#Rodzina7", "pexdark_shrekhub");
// echo DatabaseConnection::getInstance()->query("select * from Accounts");