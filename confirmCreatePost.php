<?php

require_once "Post.php";
require_once "Account.php";
session_start();

if(!isset($_SESSION["currentUser"]) || $_SESSION["currentUser"] == "none"){
    header("refresh: 0; login.php");
}

$temp = Post::createNew($_SESSION["currentUser"]->id_account, $_POST["t"], $_POST["vt"], $_POST["c"]);

if(gettype($temp) == gettype("string"))
    echo json_encode(array('0'=>$temp));
else{
    $_SESSION["currentUser"] = $temp;
    echo json_encode(array('0'=>"post.create.success"));
}
