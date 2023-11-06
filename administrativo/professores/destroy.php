<?php 
    $id = $_GET['id'];
    require_once('../../src/Models/ClassesDao/ProfessorDao.php');
    require_once('../../src/Lib/connect.php');
    

    $professorDao = new ProfessorDao($pdo);
    $professorDao->delete($id);
    header("Location: index.php");