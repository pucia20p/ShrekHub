<?php

require_once "Account.php";
session_start();

$temp = Account::login($_POST["ea"], $_POST["p"]);

if(gettype($temp) == gettype("string"))
    echo json_encode(array('0'=>$temp));
else{
    $_SESSION["currentUser"] = $temp;
    echo json_encode(array('0'=>"account.login.success"));
}

