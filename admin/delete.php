<?php
    session_start();
    include_once('../includes/connection.php');
    include_once('../includes/article.php');

    $article = new Article;

    //validate user input
    if(isset($_SESSION['logged_in'])){
        //display admin delete page
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
            $query->bindValue(1, $id);
            $query->execute();

            //redirect
            header('Location: delete.php');
        }

        $articles = $article->fetch_all();
        ?>
    <html>
        <head>
            <title> CMS Module</title>
            <link rel="stylesheet" href="../assets/style.css"/>
        </head>

        <body>
            <div class="container">
                <a href="index.php" id="logo">CMS Module | Admin Delete</a>
                <br/> <br/>
                <h4>Select Content to Delete: </h4>
                <form action="delete.php" method="get" >
                    <select onchange="this.form.submit();" name="id">

                    <?php foreach ($articles as $article) {?>
                    <option value="<?php echo $article['article_id'];?>">
                    <?php echo $article['article_title']; ?>
                    </option>
                    <?php } ?> 

                    </select>
                </form>
                <br/>
                <small><a href="index.php">Admin Page</small>
        </div>
        <body>

    </html>

        <?php
    } else{
        //redirect to index
        header('Location: index.php');
    }
?>