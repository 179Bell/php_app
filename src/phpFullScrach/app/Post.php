<?php

class Post{
    private $DB_HOST = "192.168.33.10";
    private $DB_NAME = "practice";
    private $DB_USER = "root";
    private $DB_PASSWORD = "Shingo@9616";

    protected function db_access(){
        error_reporting(E_ALL & ~E_NOTICE);

        try {
            $dbh = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASSWORD);
            return $dbh;
        } catch (PDOException $e) {
            echo "エラー!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function index(){
        $dbh = $this->db_access();

        $sql = 'SELECT * FROM posts';
        $stmt = $dbh->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    public function store(){
        $dbh = $this->db_access();

        try{
            $dbh->beginTransaction();
            $sql = 'INSERT INTO posts(title,body) VALUES(:title, :body)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
            $stmt->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
            $stmt->execute();

            $dbh->commit();
        }catch(PDOException $Exception){
            $dbh->rollback();
        }
        $result = array($_POST['title'],$_POST['body']);
        return $result; 
    }

    public function show($article_id){

        $dbh = $this->db_access();

        $sql = 'SELECT * FROM posts WHERE id= :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$article_id,PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result; 
    }

}