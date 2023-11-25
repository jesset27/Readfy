<?php
require_once('../src/Models/Classes/Sala.php');
require_once('../src/Models/ClassesDAO/SalaDao.php');
require_once('../src/Lib/connect.php');
require_once("../src/Lib/Session.php");
$session = new Session();
if ($session->obter('aluno') == null) {
    header("Location: ../login.php");
}
$salaDao = new SalaDao($pdo);
$salas = $salaDao->selectAlunoSala();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $salaDao = new SalaDao($pdo);
    if ($salaLogin = $salaDao->buscarSala($codigo)) {
        $salaDao = new SalaDao($pdo);
        $salaDao->entrarSala($_SESSION['aluno'], $salaLogin->getId());
        header("Location: index.php");
    } else {
        echo "sala não encontrada";
    };
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>READFY</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/style_professor.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="logo">
        <a href=""> <img src="\Readfy\public\img\logo6.png "> </a>
    </div>

    <div class="menu">

        <ul>
            <li style="--i: #353bf4; --j:#ea51ff">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Início
                    </span>
                </a>
            </li>
            <li style="--i: #70e094; --j:#99e599">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Galeria
                    </span>
                </a>
            </li>
            <li style="--i: #ff9966; --j:#ff5e62">
                <a href="\readfy\aluno\perfil.php">
                    <span class="icon">
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Perfil
                    </span>
                </a>
            </li>
            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="../src/Lib/session_destroy.php">
                    <span class="icon">
                        <ion-icon name="exit-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Sair
                    </span>
                </a>

            </li>
        </ul>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <div class="box">
        <div class="container3">
            <form method="POST">
                <header>Logar sala</header>
                <div class="input-field">
                    <input type="tel" class="input" id="codigo" name="codigo" placeholder="Digite o codigo da sala" required placeholder=" Digite o Código da sala" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value=" Confirmar">
                </div>
        </div>

        </form>
    </div>

    <div class="container-sala">
        <div class="label">
            <h1> Salas de Leitura</h1>
        </div>

        <div class="table-container1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sala</th>
                        <th scope="col">Nome Livro</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($salas as $sala) { ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?= $sala->nome_livros; ?></td>
                            <td><?= $sala->nome_professor; ?></td>
                            <td>
<<<<<<< Updated upstream
                                <a href="./sala/leitura/index.php?id=<?= $sala->sala_id; ?>">
                                    <button type="button" class="btn btn-primary bi bi-book-half"></button>
                                </a>
                                <a href="./sala/leitura/index.php?id=<?= $sala->sala_id; ?>">
                                    <button type="button" class="bi bi-trash3-fill btn btn-danger"></button>
                                </a>
=======
                                <button type="button" class="btn btn-primary">Entrar</button>
                                <button type="button" class="btn btn-danger">Sair</button>
                                
>>>>>>> Stashed changes
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>



</body>