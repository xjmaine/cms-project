<?php
   include_once('includes/connection.php');
   include_once('includes/article.php');

   $article = new Article; //instance of clas article
   $articles = $article->fetch_all();
   

  // print_r($articles);
   // echo time();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> CMS Demo</title>
        <link rel="stylesheet" href="assets/style.css"/>
</head>

    <body>
        <div class="container">
            <a href="index.php" id="logo">CMS</a>

            <ol>
            <!--create a foreach loop to make article load dynamic-->
            <?php foreach ($articles as $article) {?> 

                <li><a href="articlePage.php?id=<?php echo $article['article_id'];?>">
                <?php echo $article['article_title'];?></a> - 
                <small>posted on <?php echo date('l jS', $article['article_timestamp']);?></small>

                </li>
            <?php }?>
            </ol>
            <br/>
            <small><a href="admin">admin</small>
</div>
     <body>

</html>