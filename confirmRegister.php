<?php

require_once "Account.php";
session_start();

$temp = Account::createNew($_POST["ea"], $_POST["p"], $_POST["n"], $_POST["d"], $_POST["pp"]);

if(gettype($temp) == gettype("string"))
    echo json_encode(array('0'=>$temp));
else{
    $_SESSION["currentUser"] = $temp;
    echo json_encode(array('0'=>"account.register.success", $_POST["pp"]));
}
