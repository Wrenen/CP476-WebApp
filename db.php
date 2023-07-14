<?php
// connect to database
$username = $_POST['username'];
$password = $_POST['password'];

$dns = "mysql:host=localhost;dbname=cp476_db;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

try{
  $conn = new PDO($dns, $username, $password, $options);
  echo "<script>console.log('Database Connected successfully');window.location.replace(\"main.php\");</script>";
} catch (PDOException $e){
  error_log($e->getMessage());
  exit('Database connection failed'); 
}
?>S