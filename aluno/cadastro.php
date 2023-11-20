<?php
require_once('../src/Models/Classes/Aluno.php');
require_once('../src/Models/ClassesDAO/AlunoDao.php');
require_once('../src/Lib/connect.php');
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno = new Aluno();
    $aluno->setNome($_POST['nome']);
    $aluno->setUsername($_POST['username']);
    $aluno->setEmail($_POST['email']);
    $aluno->setContato($_POST['contato']);
    $aluno->setIdade($_POST['idade']);
    $aluno->setTipo('aluno');
    $aluno->setSenha($_POST['senha']);
    $alunoDao = new AlunoDAO($pdo);


    if (!$alunoDao->VerificaEmail($email)) {
        $alunoDao->inserir($aluno);
        header('Location: ../login.php');
        exit();
    } else {
        echo "O email fornecido já está em uso.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readfy/public/css/style_cadastro.css">
    <title>Cadastro Aluno</title>
</head>

<body>

    <div class="logo">
        <a href="../index.php">
            <img src="\readfy\public\img\logo5.png" alt="logo">
        </a>
    </div>
    <div class="btn_login">
        <a href="../login.php">
            <input type="submit" class="submit" value="ENTRAR">
        </a>
    </div>
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Crie o seu perfil</header>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <input type="text" class="input" id="nome" name="nome" placeholder="Nome" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" id="username" name="username" placeholder="Username" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="e-mail" class="input" id="email" name="email" placeholder="E-mail" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="tel" class="input" id="contato" name="contato" placeholder="Contato/Celular" required placeholder=" Digite seu contato" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="number" class="input" id="idade" name="idade" placeholder="Digite sua idade" required>
                    <i class="fa-regular fa-envelope"></i>
                </div><br>
                <div class="tpuser">

                    <div class="input-field">
                        <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="input-field">
                        <input type="submit" class="submit" value="CRIAR CONTA">
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</body>
</html>