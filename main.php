
<?php
/*
$dns = "mysql:host=localhost;dbname=cp476_db;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try{
  $conn = new PDO($dns, "root", "", $options);
} catch (Exception $e){
  error_log($e->getMessage());
  exit('Something weird happened'); //something a user can understand
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CP476 Group Project</title>
  <link rel="stylesheet" href="main_style.css">
</head>

<body onload="set_username()">
  <h1 id="welcome">Welcome User,</h1>

  <div class="listContainer">
    <ul class="btnList">
      <li> <a href="#"> <button class="dbBtn"><img src="assests/search.svg"> <br>search</button> </a> </li>
      <li> <a href="update.php"> <button class="dbBtn"><img src="assests/update.svg"> <br>update</button> </a> </li>
      <li> <a href="#"> <button class="dbBtn"><img src="assests/delete.svg"> <br>delete</button> </a> </li>
    </ul>
  </div>

  <script src="index.js"></script>
</body>