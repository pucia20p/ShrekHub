<?php
require_once "Account.php";
$temp = Account::login($_GET["ea"], $_GET["p"]);
if(gettype($temp) == gettype("string"))
    echo $temp;
else{
    $_SESSION["currentUser"] = $temp;
    echo "account.login.success";
}
