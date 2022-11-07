<style>
    :root{
        color: white;
        background-color: black;
    }
</style>
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
if(gettype($acc) == gettype("ae")){    
    echo $acc."<br>";
    $preAcc = DatabaseConnection::getInstance()->query("select * from Accounts where email_adress = 'puciap@hotmail.com'")->fetch_array();
    $acc = new Account($preAcc[0], $preAcc[1], $preAcc[2], $preAcc[3], $preAcc[4], $preAcc[5], $preAcc[6]);

} else {
    echo $acc->isPasswordCorrect("anhgnsws")."<br>";
}
$post = Post::createNew($acc->id_account, "Tytuuu", "video", "https://www.youtube.com/watch?v=dQw4w9WgXcQ");
echo $post->id_post;
// header("refresh: 5; ".$post->contents);


?>