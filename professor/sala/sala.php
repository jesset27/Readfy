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

$salaDao = new SalaDao($pdo);
$sal = $salaDao->mostrarAlunoSala($_GET['id']);
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
<style>
    .progress {
        background-color: #f5f5f5;
        border-radius: 2px;
        height: 20px;
    }

    .progress-bar {
        background-color: #007bff;
        height: 100%;
        text-align: center;
        color: white;
        line-height: 20px;
        /* Altura da barra para centralizar o texto */
    }
</style>

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

                    <?php foreach ($sal as $sa) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sa->nome_aluno ?></h5>
                                <br>
                                <!-- Barra de progresso Bootstrap -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <br>
                                <a href="#" class="btn btn-primary">Exibir</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sa->nome_aluno ?></h5>
                                <br>
                                <!-- Barra de progresso Bootstrap -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <br>
                                <a href="#" class="btn btn-primary">Exibir</a>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</html>