<?php
      //Start log in session
    session_start();
    include_once('../includes/connection.php');

    if(isset($_SESSION['logged_in'])){
        //index
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
            <ol>
            <li><a href="add.php">Add Article</a></li>
            <li><a href="delete.php">Delete Article</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ol>
            <br/>
            <small><a href="../index.php">Main Page</small>
    </div>
     <body>

    </html>
        <?php

    } else{
        //login 
        if(isset($_POST['username'], $_POST['password'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            //Verify if data typed
            if(empty($username) or empty($password)){
                //
                $error = 'All fields required!';
            } else{
                $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
                $query ->bindValue(1, $username);
                $query ->bindValue(2, $password);

                $query->execute();
                $num = $query->rowCount();

                if($num ==  1){
                    //proceed with login
                    $_SESSION['logged_in'] = true;
                    header('Location: index.php');
                    exit();
                }else{
                    //display error message
                    $error = "Invalid Username or Password!";
                }
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
            <br/>
            <?php if(isset($error)) { ?>
                <small style="color:#aa0000;"><?php echo $error; ?></small>
            <?php } ?>
            <br/>
            <br/>

        <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" value="Click here"/>
        </form>
    
            <br/>
            <small><a href="../index.php">Main Page</small>
    </div>
     <body>

    </html>

        <?php
    }
?>