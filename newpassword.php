<?php
require_once('src/Models/ClassesDAO/AlunoDao.php');
require_once('src/Models/Classes/Aluno.php');
require_once('src/Lib/connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['token'] == $_GET['token']) {
        echo "troca senha<br>";
        echo $_SESSION['token'] . '<br>';
        echo $_GET['token'] . '<br>';
        echo $_GET['id'];
        $alunoDao = new AlunoDao($pdo);

        if ($_POST['senha'] && $_POST['novasenha']) {
            $alunoDao->alterarSenha($_POST['senha'], $_GET['id']);
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Readfy</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Redefinir Senha</h2>
                <br>
                <form method="POST">
                    <div class="form-group">
                        <input name="senha" type="senha" class="form-control" id="senha" name="senha" required placeholder="Digite sua senha">
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="novasenha" type="novasenha" class="form-control" id="novasenha" name="novasenha" required placeholder="Digite sua nova senha">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>