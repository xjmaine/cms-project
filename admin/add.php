<?php
    session_start();
    include_once('../includes/connection.php');

    //validate login
    if(isset($_SESSION['logged_in'])){
        //display add page
        if(isset($_POST['title'], $_POST['content'])){
            $title = $_POST['title'];
            $content = nl2br($_POST['content']);

            //verify data input from user
            if(empty($title) or empty($content)){
                $error = 'All fields are required!';
            }else{
                //insert into database
                $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES(?, ?, ?)');

                $query->bindValue(1, $title);
                $query->bindValue(2, $content);
                $query->bindValue(3, time());

                $query->execute();

                //redirection
                header('Location: index.php');
            }
        }
        ?>
        <html>
            <head>
                <title> CMS Module</title>
                <link rel="stylesheet" href="../assets/style.css"/>
            </head>

            <body>
                <div class="container">
                    <a href="index.php" id="logo">CMS Module | Admin Login</a>
                    <br>
                <h4>Add Content</h4>
                <!-- call function to display error message on user input validation-->
                <?php if(isset($error)){?>
                    <small style="color:#aa0000;">
                        <?php echo  $error;?>
                    </small>
                    <br/>
                <?php }?>

                    <br/>
                    <form action="add.php" method="post" autocomplete="off">
                        <input type="text" name="title" placeholder="Title" />
                        <br/> <br/>
                        <textarea name="content" placeholder="Content"  cols="50" rows="15"></textarea>
                        <br/>
                        <input type="Submit" value="Add Content" />
                    </form>
                    <small><a href="../index.php">Main Page</small>
            </div>
            <body>

        </html>
        
        <?php
    } else{
        //redirect to index
        header('Location: index.php');
    }

?>