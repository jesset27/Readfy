<?php 
    $id = $_GET['id'];
    require_once('../../src/Models/ClassesDao/AlunoDao.php');
    require_once('../../src/Lib/connect.php');
    

    $alunoDao = new AlunoDao($pdo);
    $alunoDao->delete($id);
    header("Location: index.php");