<?php 
    $id = $_GET['id'];
    require_once('../../src/Models/ClassesDao/SalaDao.php');
    require_once('../../src/Lib/connect.php');
    

    $salaDao = new SalaDao($pdo);
    $salaDao->delete($id);
    header("Location: ../index.php");