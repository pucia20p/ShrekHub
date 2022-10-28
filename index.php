<?php

require_once "DatabaseConnection.php";
require_once "Account.php";


DatabaseConnection::defineTraits("localhost", "root", "", "");
$db = DatabaseConnection::getInstance();
$db->query("drop database if exists ShreksHub");
$db->query("create database  ShreksHub");
$db->query("use Shrekshub");
$db->query(file_get_contents("createDatabase.sql"));
$acc = Account::createNew("puciap@hotmail.com", "anhgnsws", "pexdarkum", "desc", "none");
if(gettype($acc) == gettype("ae"))    
    echo $acc;
else
    echo $acc->isPasswordCorrect("anhgnsws");
    
$post = Posts::createNew($acc->id_account, "Tytuuu", "video", "https://www.youtube.com/watch?v=dQw4w9WgXcQ");




?>