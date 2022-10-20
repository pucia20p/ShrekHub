<?php
require_once "UsefulFunctions.php";
class Post{
    public static int $post_count=0;

    public int $id_post;
    public string $publication_date;
    public int $author;
    public string $title;
    public string $value_type;
    public string $contents;

    public string $error;

    private function assignData(int $a, string $t, string $vt, string $c){
        $this->author = $a;
        $this->title = $t;
        $this->value_type = $vt;
        $this->contents = $c;
    }

    public function loadFromDatabase(int $ip, string $pd, int $a, string $t, string $vt, string $c){
        $this->id_post = $ip;
        $this->publication_date = $pd;
        $this->assignData($a, $t, $vt, $c);
    }
    public function createNew(int $a, string $t, string $vt, string $c){
        $this->error = checkTitle($t); $this->error = checkContents($c);
        
        Post::$post_count++;
        $this->id_post = Post::$post_count;
        $this->publication_date = date("d-m-y h:i:s");
        $this->assignData($a, $t, $vt, $c);
    }
}




?>