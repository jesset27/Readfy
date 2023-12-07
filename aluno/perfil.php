<?php
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");
require_once("../src/Models/Classes/Aluno.php");
require_once("../src/Models/ClassesDAO/AlunoDao.php");

$alunoDao = new AlunoDao($pdo);
$session = new Session();
if ($session->obter('aluno') == null) {
    header("Location: /readfy/login.php");
}

$aluno = $alunoDao->selectById($session->obter('aluno'));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno->setNome($_POST['nome']);
    $aluno->setUsername($_POST['username']);
    $aluno->setEmail($_POST['email']);
    $aluno->setContato($_POST['contato']);
    $aluno->setIdade($_POST['idade']);
    if (!empty($_POST['senha'])) {
        $aluno->setSenha($_POST['senha']);
    }
    $alunoDao = new AlunoDao($pdo);
    $alunoDao->update($aluno, $session->obter('aluno'));
    header("Location: index.php");
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readfy/public/css/style_cadastro.css">
    <title>Readfy</title>
</head>

<body>

    <div class="logo">
        <a href="../index.php">
            <img src="\readfy\public\img\logo5.png" alt="logo">
        </a>
    </div>
    <div class="fechar">
        <a href="\readfy\aluno\index.php">
            <img src="/readfy/public/img/fechar.png">
        </a>
    </div>
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Alterar dados aluno</header>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <input value='<?= $aluno->getNome() ?>' type="text" class="input" id="nome" name="nome" placeholder="Nome" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value='<?= $aluno->getUsername() ?>' type="text" class="input" id="username" name="username" placeholder="Username" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value='<?= $aluno->getEmail() ?>' type="e-mail" class="input" id="email" name="email" placeholder="E-mail" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value='<?= $aluno->getContato() ?>' type="tel" class="input" id="contato" name="contato" placeholder="Contato/Celular" required placeholder=" Digite seu contato" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input value='<?= $aluno->getIdade() ?>' type="number" class="input" id="idade" name="idade" placeholder="Digite sua idade" required>
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