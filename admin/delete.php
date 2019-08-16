<?php
     session_start();
     include_once('../includes/article.php');

     //instantiate article class
     $article = new Article;

    //validate login
    if (isset($_SESSION['logged_in'])) {
        //display add page
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
                    <br>
                <h4>Delete Content</h4>
                
                    <br/>
                    <form action="delete.php" method="get">
                        <select onchange="this.form.submit();">
                            <?php  
                            foreach($articles as $article) { ?>
                                <option value="<?php echo $article['article_id']; ?>"> 
                                <?php echo $article['article_title']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </form>
                    <small><a href="../index.php">Main Page</small>
            </div>
            <body>

        </html>

        <?php
    }else{
        //redirect use
        header('Location: index.php');
    }

?>