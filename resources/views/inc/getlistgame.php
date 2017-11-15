<?php
header("Content-Type: application/json; charset=UTF-8");
$servername = "localhost";

try {
   $conn = new PDO("mysql:host=$servername;dbname=bbtest;charset=utf8", "root", "");
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }

try {
  $stmt = $conn->prepare("SELECT * FROM game");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode( $result, JSON_PRETTY_PRINT );
}
catch(PDOException $e) { echo "Error: " . $e->getMessage(); }
echo $json;
$conn = null;
?>
