<?php
require_once('../../src/Models/ClassesDao/LivroDao.php');
require_once('../../src/Lib/connect.php');
require_once('../../src/Lib/Session.php');
$id = $_GET['id'];
$session = new Session();
if ($session->obter('aluno') == null) {
    header("Location: /readfy/login.php");
}
function compararDataComAtual($dataStr) {
    $dataFornecida = DateTime::createFromFormat('d/m/Y', $dataStr);
    $dataAtual = new DateTime();

    return $dataFornecida > $dataAtual;
}

$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectByIdSalaLivro($id);
$prazo = new DateTime($livro['prazo']);
$botaoHabilitado = compararDataComAtual($prazo->format('d/m/Y'));
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
    .livro {
        margin-left: 35%;
    }

    .text-center {
        color: #333333;
    }

    .fechar img {
        width: 40px;
        height: 40px;
    }

    .fechar {
        text-align: right;
        margin-top: -50px;
        margin-right: 1%;
    }

    .livro img {
        width: 280px;
    }

    body {
        background-color: #f5f5f5f5;
    }

    .ler {
        margin-left: 60%;
        margin-top: -23%
    }

    .ler img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #007bff;
        border-color: 2px solid #007bff;
        margin-bottom: 2%;
    }

    .ler h2 {
        margin-left: 2%;
        color: #333333;
    }

    .logo {
        margin-top: 0, 5%;
        margin-left: 1%;
    }

    .linha {
        border-bottom: 2px solid #333333;

    }
</style>

<body>
    <div class="linha">
        <img class="logo" src="/readfy/public/img/logo6.png" alt="">
    </div>
    <div class="fechar"><img src="\readfy\public\img\fechar.png"></div>
    <div class="professor_container">
        <br><br>
        <div class="professor">
            <div class="livro">
                <img src="/readfy/public/img/capas/<?= $livro['capa'] ?>">

                <br>
                <p class="texto"><strong>Nome do livro: <?= $livro['nome_livro'] ?></strong></p>
                <p class="texto"><strong>Prazo de leitura até : <?= $prazo->format('d/m/Y'); ?></strong></p>
            </div>
        </div>
    </div>
    <?php if ($botaoHabilitado): ?>
        <a href="./leitura/index.php?id=<?= $id; ?>">
            <div class="ler">
                <img src="\readfy\public\img\lendo.gif">
                <H2>LER</H2>
            </div>
        </a>
    <?php else: ?>
        <div class="ler disabled">
            <img src="\readfy\public\img\lendo.gif">
            <H2>LER</H2>
        </div>
    <?php endif; ?>

</body>