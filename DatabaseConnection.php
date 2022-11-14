<?php

class DatabaseConnection{
    public static ?mysqli $connection;
    private function __construct(){}

    public static function defineTraits($h, $u, $p, $d){
        if(!isset($connection))
            DatabaseConnection::$connection = new mysqli($h, $u, $p, $d);
    }
    public static function getInstance(){
        return DatabaseConnection::$connection;
    }
}
DatabaseConnection::defineTraits("localhost", "root", "", "ShreksHub");