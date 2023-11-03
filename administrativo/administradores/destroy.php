<?php 
    $id = $_GET['id'];
    require_once('../../src/Models/ClassesDao/AdminDao.php');
    require_once('../../src/Lib/connect.php');
    

    $adminDao = new AdminDao($pdo);
    $adminDao->delete($id);
    header("Location: index.php");