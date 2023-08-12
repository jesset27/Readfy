<?php
require_once("../src/Views/layout/header.php");
require_once("../src/Models/ClassesDAO/LeitorDao.php");
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");

$leitorDao = new LeitorDAO($pdo);

$usuario = $leitorDao->buscarUsuario(
    Session::obterValor('email')[1]
);
?>
<div class="container">
    <h1>Bem vindo, <?= $usuario->username; ?></h1>
</div>
<?php require "../src/Views/layout/footer.php"; ?>