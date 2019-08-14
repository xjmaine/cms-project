<?php
     //Start log in session
    session_start();
    include_once('../includes/connection.php');

        if(isset($_SESSION['logged_in'])){
            //display add article page

            if(isset($_POST['title'], $_POST['content'])){
                $title = $_POST['title'];
                $content = $_POST['content'];

                if(empty($title) or empty($content)){
                    $error = "All fields required";
                }else{
                    $conn = mysqli_connect("locahost", "root", "root", "cms");

                    $query = $pdo->prepare("INSERT INTO articles (ariticle_title, article_content, article_timestamp) VALUES (?, ?, ?, ?);");
                    
                    $query->bindValue(1, $title);
                    $query->bindValue(2, $content);
                    $query->bindValue(3, time());

                    $query->execute('execute');

                    header('Location: index.php');
                }
            }

            ?>
    <html>
        <head>
         <title> CMS Demo</title>
            <link rel="stylesheet" href="../assets/style.css"/>
        </head>

        <body>
             <div class="container">
                 <a href="index.php" id="logo">CMS</a>
                 <br>
                   
                <h4>Add Article</h4><br> <br>

                <br/>
                <?php if(isset($error)) { ?>
                    <small style="color:#aa0000;"><?php echo $error; ?></small>
                <?php } ?>
                <br/>

                <form action="add.php" method="post" autocomplete="on">
                <input type="text" name="title" placeholder="Title" /> <br/><br/>
                <textarea rows="15" cols="50" placeholder="Content" name="content"></textarea><br/><br/>
                <input type="submit" value="Add Article" />
                </form>
                 
                 <br/>
                 <small><a href="../index.php">Home Page</small><br/><br/>
                 
             </div>
        <body>

    </html>
            <?php


        }else{
            //redirect to index
            header('Location: index.php');
        }

?>