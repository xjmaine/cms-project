<?php
include_once('includes/connection.php');
include_once('includes/article.php');
    $article = new Article;

//check if user specified id
if(isset($_GET['id'])){
    //display article
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

    //main display page
    ?>
    <html>
    <head>
        <title>CMS Module</title>
        <link rel="stylesheet" href="assets/style.css"/>
    </head>

    <body>
        <div class="container">
            <a href="index.php" id="logo">CMS Module | General News</a>

            
            <h4>
                <?php echo $data['article_title'];?>
                <small>
                    posted on <?php echo date('l jS', $data['article_timestamp']) ?>
                </small>
        </h4>
        <p>
            <?php echo $data['article_content']; ?>
        </p>
        <a href="index.php">&larr; Main Page</a>
            <br/>
        </div>
    </body>


</html>
    <?php
    
}else{
    header('Location: index.php');
    exit();
}

?>