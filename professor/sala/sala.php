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

$sals = $salaDao->mostrarAlunoSala($_GET['id']);
var_dump($sals);
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
        background-color: #FFA500;
        border-radius: 10px;
        height: 20px;
        width: 200px;

    }

    .progress-bar {
        background-color: #007bff;
        height: 100%;
        text-align: center;
        color: white;
        line-height: 20px;
        /* Altura da barra para centralizar o texto */
    }

    .texto {
        color: #333333;
    }

    .alunos {
        /* border: 2px solid #333333; */
        width: 80%;
        margin-left: 22%;
        margin-top: -40%;
    }

    .alunos h3 {
        margin-top: 2%;
        margin-bottom: -2%;
    }

    .professor_container {

        width: 38%;
    }

    .livro {
        margin-left: 0, 5%;
    }

    .text-center {
        color: #333333;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: -85px;
    }

    .card {
        width: 230px;
    }

    .fechar img {
        width: 40px;
    }

    .fechar {
        text-align: right;
        margin-top: -50px;
    }

    .logo {
        margin-top: 0, 5%;
        margin-left: 1%;
    }

    .linha {
        border-bottom: 2px solid #333333;
        width: 100%;

    }
</style>


<body>
    <div class="p-3 mb-2 bg-light text-dark">
        <div class="linha">
            <img class="logo" src="/readfy/public/img/logo6.png" alt="">
        </div>
        <div class="fechar"><img src="\readfy\public\img\fechar.png"></div>
        <div class="professor_container">
            <br><br>
            <div class="professor">
                <div class="livro">
                    <img class="logo" src="<?= "../../public/img/capas/" . $livro->getCapa() ?>" alt="">
                    <br>
                    <p class="texto"><strong>Nome do livro: <?= $livro->getNome() ?></strong></p>
                    <p class="texto"><strong>Prazo de leitura até : <?= $sala->getPrazo(); ?></strong></p>
                </div>
            </div>
        </div>

        <div class="alunos">
            <h3 class="text-center">Alunos</h3>

            <div class="container">
                <?php foreach ($sals as $sal) : ?>
                    <div class="card">
                        <img src="\readfy\public\img\Coruja_lendo 2 .jpg" class="card-img-top" alt="Livro 1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $sal->nome_aluno ?></h5>
                            <br>
                            <!-- Barra de progresso Bootstrap -->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= $sal->soma_porcentagem?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $sal->soma_porcentagem?>  </div>
                            </div>
                            <br>
                            <a href="#" class="btn btn-primary">Exibir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</html>