<?php
require_once "UsefulFunctions.php";
require_once "DatabaseConnection.php";
class Post{

    public int $id_post;
    public string $publication_date;
    public int $author;
    public string $title;
    public string $value_type;
    public string $contents;

    public string $error;

    private function __construct(int $ip, string $pd, int $a, string $t, string $vt, string $c){
        $this->id_post = $ip;
        $this->publication_date = $pd;
        $this->author = $a;
        $this->title = $t;
        $this->value_type = $vt;
        $this->contents = $c;
    }
    public static function createNew(int $a, string $t, string $vt, string $c){
        $this->error = checkTitle($t); $this->error = checkContents($c);
        $rn = date("d-m-y h:i:s");
        if($error == "none"){
            $con = DatabaseConnection::getInstance();
            if($con->connection->query("insert into Posts(publication_date, author, title, value_type, contents) values(".$rn.", ".$a.", ".$t.", ".$vt.", ".$c.")")!=TRUE){
                $error = "There was a problem with the database, please try again later!";
                return $error;
            }
        } else
            return $error;
        return new Post(DatabaseConnection::getInstance()->query("select id_post from Posts where publication_date = '".$rn."' and author = ".$a), $rn, $a, $t, $vt, $c);
    }
}




?>