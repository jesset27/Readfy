<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readfy/public/css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Entrar</title>

</head>
<?php

require "src/Lib/connect.php";
require_once("src/Lib/Session.php");
require_once("./src/Models/ClassesDAO/LoginDao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $login = new LoginDao($pdo);
    $login->login($email, $senha);
}

?>
<body>
<div class="logo">
   <a href="index.php"><img src="/readfy/public/img/logo5.png"> </a>
</div>
<div class="fechar">
   <a href="index.php"><img src="/readfy/public/img/fechar.png"> </a>
</div>                        

<div class="box">
    <div class="container">
        <div class="top-header">

        <header>Login</header>
    </div>    

        <div class="input-field">
            <input type="text" class="input" id="email" name="email" placeholder="E-mail" required>
            <i class="fa-regular fa-envelope"></i>
        </div>

        <div class="input-field">
            <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
            <i class="fa-solid fa-lock"></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="ENTRAR">
        </div>

        <div class="bottom">
            <div class="left">
                <input type="checkbox" id="check">
                <label for="check">Lembrar senha</label>
            </div>

            <div class="right">
                <label><a href="#"> Esqueceu a senha?</a></label>

            </div>
        </div>
    </div>
</div>

</body>
</html>