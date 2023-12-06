<?php
require_once('../src/Models/Classes/Sala.php');
require_once('../src/Models/ClassesDAO/SalaDao.php');
require_once('../src/Lib/connect.php');
require_once("../src/Lib/Session.php");
$session = new Session();
if ($session->obter('aluno') == null) {
    header("Location: /readfy/login.php");
}

$salaDao = new SalaDao($pdo);
$salaDao->excluirAlunoSala($_GET["id"], $session->obter('aluno'));
