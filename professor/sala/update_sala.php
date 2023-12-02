<?php
require_once "../../src/Models/Classes/Livro.php";
require_once "../../src/Models/ClassesDAO/LivroDao.php";

require_once("../../src/Models/Classes/Sala.php");
require_once("../../src/Models/ClassesDAO/SalaDao.php");
require_once "../../src/Lib/connect.php";

require_once("../../src/Lib/Session.php");
$session = new Session();
if ($session->obter('professor') == null) {
    header("Location: ../login.php");
}
$livroDao = new LivroDao($pdo);
$livros = $livroDao->selectAll();
$salaDao = new SalaDao($pdo);
$sala = $salaDao->selectById($_GET['id']);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salaObj = new Sala();
    $salaObj->setCodigo();
    $salaObj->setLivrosId($_POST['livros_id']);
    $salaObj->setPaginaInicial($_POST['pg_inicial']);
    $salaObj->setProfessorId($_SESSION['professor']);
    $salaObj->setPaginaFinal($_POST['pg_final']);
    $salaObj->setNome($_POST['nome']);
    $salaObj->setDescricao($_POST['descricao']);
    $salaObj->setPrazo($_POST['prazo']);
    $salaDao = new SalaDao($pdo);
    $salaDao->update($salaObj, $_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>EDITAR SALA</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src='main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/style_criar_sala.css'>
</head>

<body>
    <div class="logo">
        <a href=""> <img src="\Readfy\public\img\logo6.png "> </a>
    </div>
    <div class="container">
        <ul>
            <li style="--i: #353bf4; --j:#ea51ff">
                <a href="\Readfy\professor\index.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Início
                    </span>
                </a>
            </li>
            <li style="--i: #70e094; --j:#32CD32">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Galeria
                    </span>
                </a>
            </li>
            <li style="--i: #1E90FF; --j:#4D94FF">
                <a href="\Readfy\professor\criar_sala.php">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Criar Sala
                    </span>
                </a>
            </li>
            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Perfil
                    </span>
                </a>
            </li>
            <li style="--i:#FF0000; --j:#f66333f1">
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
        <div class="">
            <div class="container_edit_sala">
                <div class="top-header">

                    <header>EDITAR SALA</header>
                </div>

                <form action="" method="post">
                    <div class="input-field">
                        <select name="livros_id" class="form-select" id="livros_id" required>
                            <option value="" disabled selected>Selecione um Livro</option>
                            <?php foreach ($livros as $livro) : ?>
                                <option value="<?= $livro->getId() ?>" <?= $livro->getId() == $sala->getLivrosId() ? 'selected' : '' ?>><?= $livro->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="nome" name="nome" value="<?= $sala->getNome(); ?>" placeholder="Digite o nome" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="descricao" name="descricao" value="<?= $sala->getDescricao(); ?>" placeholder="Digite a descricao" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="pg_inicial" name="pg_inicial" value="<?= $sala->getPaginaInicial() ?>" placeholder="Digite a pagina inicial de leitura" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="pg_final" name="pg_final" value="<?= $sala->getPaginaFinal() ?>" placeholder="Digite a pagina final de leitura" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="prazo" name="prazo" value="<?= $sala->getPrazo() ?>" placeholder="Digite o prazo máximo de leitura" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="SALVAR">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>