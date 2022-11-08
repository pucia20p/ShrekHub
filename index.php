<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShrekHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body class="bc-black c-w">
    <a class="btn btn-primary" href="login.php">login</a>
</body>
</html>

<?php

require_once "DatabaseConnection.php";
require_once "Account.php";
require_once "Post.php";




DatabaseConnection::defineTraits("localhost", "root", "", "");

// $db = DatabaseConnection::getInstance();
// $db->query("drop database if exists ShreksHub");
// $db->query("create database ShreksHub");
// $db->query("use Shrekshub");
// $db->multi_query(file_get_contents("createDatabase.sql"));




// $acc = Account::createNew("puciap@hotmail.com", "anhgnsws", "pexdarkum", "", "");
// if(gettype($acc) == gettype("ae")){    
//     echo $acc."<br>";
//     $acc = Account::login("puciap@hotmail.com", "anhgnsws");
//     if(gettype($acc) == gettype("ae"))
//         echo $acc."<br>";
// }
// echo $acc->id_account."<br>";
// $post = Post::createNew($acc->id_account, "Tytuuu", "video", "https://www.youtube.com/watch?v=dQw4w9WgXcQ");
// echo $post->id_post;
// header("refresh: 5; ".$post->contents);


?>