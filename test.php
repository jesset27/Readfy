<?php
require_once("./src/Models/Classes/Professor.php");
require_once("./src/Models/ClassesDAO/ProfessorDao.php");
require_once("./src/Lib/connect.php");
echo "php";
$professor = new Professor(
    "Jessé",
    "jesset27",
    "jessewillian0@gmail.com",
    "18996961649",
    "20",
    "aluno",
    "1234"
);
$professorDao = new ProfessorDao($pdo);
$professorDao->inserir($professor);