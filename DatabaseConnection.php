<?php

class DatabaseConnection{
    private static ?DatabaseConnection $initialObject;
    private ?mysqli $connection;

    private function __construct(){}
    public function defineTraits($h, $u, $p, $d){
        $this->connection = new mysqli($h, $u, $p, $d);
    }
    public static function getInstance(){
        if(!isset(DatabaseConnection::$initialObject))
            DatabaseConnection::$initialObject = new DatabaseConnection(); 
        return DatabaseConnection::$initialObject;
    }

}





