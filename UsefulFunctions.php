<?php
function checkEmail(string $ea) : string{
    if(filter_var($ea, FILTER_VALIDATE_EMAIL)){
        return "Email format incorrect!";
    }
    return "none";
}
function checkPass(string $p) : string{
    if(preg_match('/^[!@#%&*_+-=a-zA-Z0-9]{8}/', $p) || strlen($p) > 45){
        return "Passowrds can consist only of letters, numbers, certain special characters (!@#%&*_+-=), and must have between 8 and 45 characters!";
    }
    return "none";
}
function checkNickname(string $n) : string{
    if(preg_match('/^[-_A-Za-z0-9]/', $n)){
        return "Nicknames can consist only of letters, numbers, certain special characters (-_) and must have between 8 and 45 characters!";
    }
    return "none";
}
function checkDescription(string $d) : string{
    if($d == "none"){
        return "This user currently doesn't have a description!";
    }
    return "none";
}
function checkTitle(string $t) : string{
    if(strlen($t) > 250 || strlen($t) < 3)
        return "Titles must be between 3 and 250 characters";
    return "none";
}
function checkContents(string $c) : string{
    if(strlen($c) > 1000)
        return "Posts can't have more than 1000 characters!";
    return "none";
}