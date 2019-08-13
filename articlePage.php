<?php
   include_once('includes/connection.php');
   include_once('includes/article.php');
    //instantiate the class article
    $article = new Article;
   //get page id from user
   if(isset($_GET['id']))
   {
       //display article
       $id = $_GET['id'];
       $data = $article-> fetch_data($id);
    ?> 
        <!--Creating the actual page--> 
     
        <html>
        <head>
            <title> CMS Demo</title>
            <link rel="stylesheet" href="assets/style.css"/>
        </head>
    
        <body>
            <div class="container">
                <a href="index.php" id="logo">CMS</a>
    
                <h4><?php echo $data['article_title'];?> </h4>
                <small>
                posted on <?php echo date('l jS', $data['article_timestamp']);?>
                </small>
                <p> <?php echo $data['article_content']; ?> </p>
                <a href="index.php">&larr; Back</a>
            </div>
        <body>
    
         </html>
      
    <?php }
   
   else{
       header('Location: index.php');
       exit();
   }

?>