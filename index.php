<?php

require_once "DatabaseConnection.php";
require_once "Account.php";
require_once "Post.php";


DatabaseConnection::defineTraits("localhost", "root", "", "ShreksHub");
// $db = DatabaseConnection::getInstance();
// $db->query("drop database if exists ShreksHub");
// $db->query("create database ShreksHub");
// $db->query("use Shrekshub");
// $db->multi_query(file_get_contents("createDatabase.sql"));

$acc = Account::createNew("puciap@hotmail.com", "anhgnsws", "pexdarkum", "", "");
if(gettype($acc) == gettype("ae"))    
    echo $acc;
else{
    echo $acc->isPasswordCorrect("anhgnsws");
    var_dump($acc);
    $post = Post::createNew($acc->id_account, "Tytuuu", "video", "https://www.youtube.com/watch?v=dQw4w9WgXcQ");

}


?>