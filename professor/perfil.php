<?php
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");
require_once("../src/Models/Classes/Professor.php");
require_once("../src/Models/ClassesDAO/ProfessorDao.php");

$professorDao = new ProfessorDao($pdo);
$session = new Session();

$professor = $professorDao->selectById($session->obter('professor'));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $professor->setNome($_POST['nome']);
    $professor->setUsername($_POST['username']);
    $professor->setEmail($_POST['email']);
    $professor->setContato($_POST['contato']);
    $professor->setIdade($_POST['idade']);
    if (!empty($_POST['senha'])) {
        $professor->setSenha($_POST['senha']);
    }
    $professorDao = new ProfessorDao($pdo);
    $professorDao->update($professor, $_GET['id']);
    header("Location: index.php");
} ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readfy/public/css/style_cadastro.css">
    <title>Meu Perfi</title>
</head>

<body>

    <div class="logo">
        <a href="../index.php">
            <img src="\readfy\public\img\logo5.png" alt="logo">
        </a>
    </div>
    <div class="fechar">
        <a href="\readfy\professor\index.php">
            <img src="/readfy/public/img/fechar.png">
        </a>
    </div>
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Meu perfil</header>
            </div>
            <form method="POST">
                <div class="input-field">
                    <input value="<?= $professor->getNome() ?>" type="text" class="input" id="nome" name="nome" placeholder="Nome" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value="<?= $professor->getUsername() ?>" type="text" class="input" id="username" name="username" placeholder="Username" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value="<?= $professor->getEmail() ?>" type="e-mail" class="input" id="email" name="email" placeholder="E-mail" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value="<?= $professor->getContato() ?>" type="tel" class="input" id="contato" name="contato" placeholder="Contato/Celular" required placeholder=" Digite seu contato" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value="<?= $professor->getIdade() ?>" type="number" class="input" id="idade" name="idade" placeholder="Digite sua idade" required>
                    <i class="fa-regular fa-envelope"></i>
                </div><br>
                <div class="tpuser">

                    <div class="input-field">
                        <input type="password" id="senha" name="senha" class="input" placeholder="Senha">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="btn_alterar">
                        <a href="#">
                            <input type="submit" class="submit" value="SALVAR">
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>

</html>