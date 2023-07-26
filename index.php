<?php
  
  $is_invalid = false;
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $is_invalid = false;
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connnect to the database
    require_once 'db.php';

    // Prepare statement to get the username and password
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE username = :username");

    $stmt->bindParam(':username',$username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validate if passwords match
    if ($result == true) {
        if ( $result["password"] == $password ){

            session_start();
            $_SESSION["username"] = $result["username"];
            
            header("Location: main.php");
            exit;
        }
    }

    $is_invalid = true;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CP476 Login</title>
    <link rel="stylesheet" href="index_style.css">
  </head>
  <body>
    <div class = "main">
        <h1>Welcome Back,</h1>
        <h2>Please sign in to continue</h2>

        <?php if ($is_invalid):?>
          <p>Invaild, Please try again</p>
        <?php endif; ?>

        <form method="post">
            <div class = "txt_field">
                <input type="text" name="username" id ="username" placeholder="Username"/>
            </div>

            <div class = "txt_field">
                <input type="password" name="password" id ="password" placeholder="Password"/>
            </div>

            <input type="submit" value="Login">
        </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>