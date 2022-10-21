<?php

class DatabaseConnection{
    private static ?DatabaseConnection $initialObject;
    public ?mysqli $connection;

    private function __construct(){}

    public static function defineTraits($h, $u, $p, $d){
        if(!isset(DatabaseConnection::$initialObject))
            DatabaseConnection::$initialObject = new DatabaseConnection(); 
        DatabaseConnection::$initialObject->connection = new mysqli($h, $u, $p, $d);
    }
    public static function getInstance(){
        return DatabaseConnection::$initialObject;
    }

}





