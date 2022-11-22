<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShrekHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header class="d-flexx justify-content-between bg-secondary p-3">
        <a href="index.php"><img src="logo.png" alt="logo"></a>
        <nav>
            <ul class="d-flexx flex-column justify-content-between align-items-end">
                <li id="login">
                    <a href="login.php" class="btn btn-primary">Zaloguj się</a>
                </li>
                <li id="createPost">
                    <a href="createPost.php" class="btn btn-primary">Napisz coś...</a>
                </li>
                <li id="settings">
                    <a href="settings.php" class="btn btn-primary">
                        <img src="" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <script defer src="menu-control.js"></script>
</body>
</html>

<?php

// require_once "DatabaseConnection.php";
// require_once "Account.php";
// require_once "Post.php";
// session_start();
// $_SESSION["currentUser"]="none";

// DatabaseConnection::defineTraits("localhost", "root", "", "");

// $db = DatabaseConnection::getInstance();
// $db->query("drop database if exists ShrekHub");
// $db->query("create database ShrekHub");
// $db->query("use Shrekhub");
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