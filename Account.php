<?php
require_once "UsefulFunctions.php";
require_once "DatabaseConnection.php";

class Account{
    public $id_account;
    private $email_adress;
    private $pass;
    private $creation_date;

    public $nickname;
    public $descriptions;
    public $profile_picture;

    public function __construct(int $ia, string $ea, string $n, string $p, string $cd, string $d, string $pp){
        $this->id_account = $ia;
        $this->email_adress = $ea;
        $this->nickname = $n;
        $this->pass = $p;
        $this->creation_date = $cd;
        $this->descriptions = $d;
        $this->profile_picture = $pp;
    }
    public static function createNew(string $ea, string $p, string $n, string $d, string $pp){ //returns either error message or a newly created account that is already in the database
        $n = str_replace("'", "\'", $n);
        $d = str_replace("'", "\'", $d);
        $error = "none";
        if($error=="none"){
            $error = checkEmail($ea);
            if($error=="none" && isEmailInDatabase($ea)){
                $error = "Email zajęty!";
            }
        }
        if($error=="none")
            $error = checkPass($p); 
        if($error=="none")
            $error = checkNickname($n);

        $rn = date("y-m-d H:i:s");
        if($error == "none"){
            $con = DatabaseConnection::getInstance();
            if(!$con->query("insert into Accounts(email_adress, nickname, pass, creation_date, descriptions, profile_picture) values ('".$ea."', '".$n."', '".md5($p)."', '".$rn."', '".checkDescription($d)."', '".$pp."')")){
                $error = "wystąpił problem z databazą";
                return $error;
            }
        } else
            return $error;
        $con = DatabaseConnection::getInstance();
        return new Account(intval($con->query("select id_account from Accounts where email_adress = '".$ea."'")->fetch_array()[0]), $ea, $n, md5($p), $rn, checkDescription($d), $pp);
    }
    public function isPasswordCorrect($p){
        if(md5($p) == $this->pass)
            return true;
        return false;
    }
    
    public static function login(string $ea, string $p){
        if(!isEmailInDatabase($ea))
            return "email nie istnieje!";

        $con = DatabaseConnection::getInstance();
        $preAcc = $con->query("select * from Accounts where email_adress = '".$ea."'")->fetch_array();

        $acc = new Account($preAcc[0], $preAcc[1], $preAcc[2], $preAcc[3], $preAcc[4], $preAcc[5], $preAcc[6]);

        if(!$acc->isPasswordCorrect($p))
            return "Złe hasło";
        return $acc;
    }
    public static function getNumOfUsers(){
        $con = DatabaseConnection::getInstance();
        return $con->query("select id_account from Accounts order by id_account desc limit 1")->fetch_array()[0];
    }
    public static function getPublicUserData(int $id){
        $con = DatabaseConnection::getInstance();
        $arr = $con->query("select id_account, nickname, descriptions, profile_picture from Accounts where id_account = ".$id)->fetch_array();
        return $arr;
    }
}

?>