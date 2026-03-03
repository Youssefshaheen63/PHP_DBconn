<?php

$dbType = 'mysql';
$dbName = 'iti_os';
$host = 'localhost';
$userName= 'root';
$password='';

try {
  $conn = new PDO("$dbType:host=$host;dbname=$dbName", $userName, $password);
  echo 'Connected Successfully';
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>