<?php
function checkEmail(string $ea) : string{
    if(!filter_var($ea, FILTER_VALIDATE_EMAIL)){
        return "error.account.creation.email";
    }
    return "none";
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