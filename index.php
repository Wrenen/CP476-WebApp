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
        <p id = "incorrect"></p>
        <form>
            <div class = "txt_field">
                <input type="text" id ="userID" placeholder="Username"/>
            </div>
            <div class = "txt_field">
                <input type="password" id ="password" placeholder="Password"/>
            </div>
            <input type="button" value="Login" onclick="authorize_user();"/>
        </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>