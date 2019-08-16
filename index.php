<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();



?>
<html>
    <head>
        <title>CMS Module</title>
        <link rel="stylesheet" href="assets/style.css"/>
    </head>

    <body>
        <div class="container">
            <a href="index.php" id="logo">CMS Module</a>

            
            <ol>
            <?php //using foreach to make load dynamic 
            foreach($articles as $article) { ?>
            
                <li><a href="article.php?id=<?php echo $article['article_id'];?>">
                <?php echo $article['article_title']; ?>
            </a> 
            - <small>
                posted on <?php echo date('l jS', $article['article_timestamp']); ?>
            </small>
        </li>
            <?php }?>

            </ol>
            <br/>
            <small>
                <a href="admin">Admin</a>
            </small>
        </div>
    </body>


</html>

