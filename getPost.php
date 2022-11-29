<?php
require_once "DatabaseConnection.php";
require_once "Account.php";
require_once "Post.php";

$con = DatabaseConnection::getInstance();
$id = $_POST["id"];
$query = "select id_post, publication_date, author, title, value_type, contents, id_account, nickname, profile_picture from Posts inner join Accounts on Posts.author = Accounts.id_account where id_post = ".$id."";
$wyn = $con->query($query)->fetch_array();
echo json_encode($wyn);