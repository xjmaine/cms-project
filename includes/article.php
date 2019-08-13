<?php
    class Article{
        //methods to fetch articles

        public function fetch_all()
        {
            global $pdo; //global variable from conection
            $query = $pdo->prepare("SELECT * FROM articles");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($article_id)
        {
            global $pdo; 
            $query = $pdo->prepare("SELECT * FROM articles WHERE article_id=?");
            $query -> bindValue(1, $article_id);
            $query->execute();

            return $query->fetch();
        }
    }

?>