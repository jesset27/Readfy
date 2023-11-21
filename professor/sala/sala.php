<?php
require_once "../../src/Models/Classes/Livro.php";
require_once "../../src/Models/ClassesDAO/LivroDao.php";

require_once "../../src/Models/Classes/Sala.php";
require_once "../../src/Models/ClassesDAO/SalaDao.php";
require_once "../../src/Lib/connect.php";

require_once("../../src/Lib/Session.php");
$session = new Session();
if ($session->obter('professor') == null) {
    header("Location: ../login.php");
}
$salaDao = new SalaDao($pdo);
$sala = $salaDao->selectById($_GET['id']);


$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectById($sala->getLivrosId());
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/salastyle.css'>

    <title>Sala Professor</title>
</head>

<body>
    <img class="logo" src="../../public/img/logo.png" alt="">
    <div class="container">
        <br><br>
        <div class="professor">
            <div class="livro">
                <img class="logo" src="<?= "../../public/img/capas/" . $livro->getCapa() ?>" alt="">
                <p>Nome do livro: <?= $livro->getNome() ?></p>
                <p>Prazo maximo até <?= $sala->getPrazo(); ?></p>
                <div>
                    <a href="../index.php">Sair</a>
                </div>
            </div>
            <div class="alunos text-center">
                <h3 class="text-center">Alunos</h3>
                <div class="card-container">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jessé Willian Gimenes dos Santos</h5>
                            <a href="#" class="btn btn-primary">Exibir</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jessé Willian Gimenes dos Santos</h5>
                            <a href="#" class="btn btn-primary">Exibir</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jessé Willian Gimenes dos Santos</h5>
                            <a href="#" class="btn btn-primary">Exibir</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jessé Willian Gimenes dos Santos</h5>
                            <a href="#" class="btn btn-primary">Exibir</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</html>