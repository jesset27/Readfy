<?php 
  require_once('config_inc.php');
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=readfy", "root", "");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }
?>