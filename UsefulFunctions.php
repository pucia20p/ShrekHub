<?php
require_once "DatabaseConnection.php";



function checkEmail(string $ea) : string{
    if(!filter_var($ea, FILTER_VALIDATE_EMAIL)){
        return "Email jest niepoprawny";
    }
    return "none";
}
function isEmailInDatabase(string $ea) : bool{
    if(isset(DatabaseConnection::$connection->query("select email_adress from Accounts where email_adress = '".$ea."'")->fetch_array()[0]))
        return true;
    return false;
}
function checkPass(string $p) : string{
    if(!preg_match('/^[!@#%&*_+-=a-zA-Z0-9]{8}/', $p) || strlen($p) > 45){
        return "Hasło może się składać z dużych i małych liter, cyfr oraz znaków -_!@#%&* i musi zawierać od 8 do 45 znaków";
    }
    return "none";
}
function checkNickname(string $n) : string{
    if(!preg_match('/^[-_A-Za-z0-9]/', $n) || strlen($n) < 3 || strlen($n) > 45){
        return "Nick może się składać z dużych i małych liter, cyfr oraz znaków -_ i musi zawierać od 8 do 45 znaków";
    }
    return "none";
}
function checkDescription(string $d) : string{
    if($d == "none"){
        return "Ten użytkownik nie ma opisu profilu";
    }
    return $d;
}
function checkValueType(string $vt) : string{
    if($vt != "text" && $vt != "image" && $vt != "video")
        return "strona przestała działać";
    return "none";
}
function checkTitle(string $t) : string{
    if(strlen($t) >= 250 || strlen($t) < 3)
        return "Tytuł może mieć od 3 do 250 znaków";
    return "none";
}
function checkContents(string $c) : string{
    if(strlen($c) > 1000)
        return "Post nie może mieć ponad 1000 znaków";
    return "none";
}