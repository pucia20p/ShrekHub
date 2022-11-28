<?php

require_once "Account.php";
require_once "Post.php";
require_once "DatabaseConnection.php";
$db = DatabaseConnection::getInstance();
$posts = Post::getNumOfPosts();
$page = $_POST["page"];
$arr = Array();
// echo $posts." ".$page."<br>";
for($i = $posts-(10*$page); $i > $posts-(10*$page)-10; $i--){
    if($i >= 0){
        // echo $i."<br>";
        $query = "select id_post, publication_date, author, title, value_type, contents, id_account, nickname, profile_picture from Posts inner join Accounts on Posts.author = Accounts.id_account where id_post = ".$i."";
        $wyn = $db->query($query)->fetch_array();
        array_push($arr, $wyn);
    }
}

// var_dump($arr);
echo json_encode($arr);
