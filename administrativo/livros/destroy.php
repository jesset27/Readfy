<?php 
    $id = $_GET['id'];
    require_once('../../src/Models/ClassesDao/LivroDao.php');
    require_once('../../src/Lib/connect.php');
    

    $livroDao = new LivroDao($pdo);
    $livroDao->delete($id);
    header("Location: index.php");