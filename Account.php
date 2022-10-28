<?php
require_once "UsefulFunctions.php";
require_once "DatabaseConnection.php";

class Account{
    public int $id_account;
    private string $email_adress;
    private string $pass;
    private string $creation_date;

    public string $nickname;
    public string $descriptions;
    public string $profile_picture;

    public function __construct(int $ia, string $ea, string $p, string $cd, string $n, string $d, string $pp){
        $this->id_account = $ia;
        $this->email_adress = $ea;
        $this->pass = $p;
        $this->creation_date = $cd;
        $this->nickname = $n;
        $this->descriptions = $d;
        $this->profile_picture = $pp;
    }
    public static function createNew(string $ea, string $p, string $n, string $d, string $pp){ //returns either error message or a newly created account that is already in the database
        $error = checkEmail($ea); $error = checkPass($p); $error = checkNickname($n);
        $rn = date("d-m-y h:i:s");
        if($error == "none"){
            $con = DatabaseConnection::getInstance();
            if($con->connection->query("insert into Accounts(email_adress, nickname, pass, creation_date, descriptions, profile_picture) values(".$ea.", ".md5($p).", ".$rn.", ".$n.", ".checkDescription($d).", ".$pp.")")!=TRUE){
                $error = "There was a problem with the database, please try again later!";
                return $error;
            }
        } else
            return $error;

        return new Account(DatabaseConnection::getInstance()->query("select id_account from Accounts where email_adress = '".$ea."'"), $ea, md5($p), $rn, $n, checkDescription($d), $pp);
    }
    public function isPasswordCorrect($p){
        if(md5($p) == $this->pass)
            return true;
        return false;
    }
}

?>