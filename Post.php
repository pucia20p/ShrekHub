<?php
require_once "UsefulFunctions.php";
require_once "DatabaseConnection.php";
class Post{

    public $id_post;
    public $publication_date;
    public $author;
    public $title;
    public $value_type;
    public $contents;

    public $error;

    private function __construct(int $ip, string $pd, int $a, string $t, string $vt, string $c){
        $this->id_post = $ip;
        $this->publication_date = $pd;
        $this->author = $a;
        $this->title = $t;
        $this->value_type = $vt;
        $this->contents = $c;
    }
    public static function createNew(int $a, string $t, string $vt, string $c){
        $t = str_replace("'", "\'", $t);
        
        $error = "none";
        if($error=="none")
            $error = checkTitle($t); 
        if($error=="none")
            $error = checkValueType($vt);
        if($error=="none" && $vt == "text"){
            $error = checkContents($c);
            $c = str_replace("'", "\'", $c);
        }
        
        $rn = date("y-m-d h:i:s");
        if($error == "none"){
            $con = DatabaseConnection::getInstance();
            if($con->query("insert into Posts(publication_date, author, title, value_type, contents) values('".$rn."', '".$a."', '".$t."', '".$vt."', '".$c."')")!=TRUE){
                $error = "problem z databazą";
                return $error;
            }
        } else
            return $error;
        $con = DatabaseConnection::getInstance();
        return new Post(intval($con->query("select id_post from Posts where publication_date = '".$rn."' and author = ".$a)->fetch_array()[0]), $rn, $a, $t, $vt, $c);
    }
    public static function getNumOfPosts(){
        $con = DatabaseConnection::getInstance();
        return $con->query("select id_post from Posts order by id_post desc limit 1")->fetch_array()[0];
    }
}




?>