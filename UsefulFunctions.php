<?php
require_once "DatabaseConnection.php";



function checkEmail(string $ea) : string{
    if(!filter_var($ea, FILTER_VALIDATE_EMAIL)){
        return "error.account.creation.email";
    }
    return "none";
}
function isEmailInDatabase(string $ea) : string{
    $rrr = DatabaseConnection::$connection->query("select email_adress from Accounts where email_adress = '".$ea."'")->fetch_array();
    array_push($rrr, "check");
    
    if($rrr[0] == "check")
        return "none";
    return "error.account.creation.email.taken";
}
function checkPass(string $p) : string{
    if(!preg_match('/^[!@#%&*_+-=a-zA-Z0-9]{8}/', $p) || strlen($p) > 45){
        return "error.account.creation.password";
    }
    return "none";
}
function checkNickname(string $n) : string{
    if(!preg_match('/^[-_A-Za-z0-9]/', $n) || strlen($n) < 8 || strlen($n) > 45){
        return "error.account.creation.nickname";
    }
    return "none";
}
function checkDescription(string $d) : string{
    if($d == "none"){
        return "account.default.description";
    }
    return $d;
}
function checkValueType(string $vt) : string{
    if($vt != "text" && $vt != "image" && $vt != "video")
        return "error.post.creation.value_type";
    return "none";
}
function checkTitle(string $t) : string{
    if(strlen($t) >= 250 || strlen($t) <= 3)
        return "error.post.creation.title";
    return "none";
}
function checkContents(string $c) : string{
    if(strlen($c) > 1000)
        return "error.post.creation.contents";
    return "none";
}