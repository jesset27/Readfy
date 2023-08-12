<?php 
    $id = $_GET['id'];
    require_once('../src/Models/ClassesDAO/LeitorDao.php');
    require_once('../src/Lib/connect.php');
    $leitorDao = new LeitorDAO($pdo);
    $leitorDao->deletar($id);
    header("Location: ./leitores.php");
?>