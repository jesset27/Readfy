<?php

require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Livro.php');
require_once('../../src/Models/ClassesDao/LivroDao.php');

// Criar uma instância da classe LivroDao
$livroDao = new LivroDao($pdo);

$livro = $livroDao->selectById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livro->setNome($_POST['nomeLivro']);
    $livro->setEditora($_POST['editora']);
    $livro->setAutor($_POST['autor']);
    $livro->setDataLancamento($_POST['dataLancamento']);
    $livro->setCaminho($_FILES['livro']);
    $livro->setGenero($_POST['genero']);
    $livro->setTotalDePaginas($_POST['totalpaginas']);
    $livro->setCapa($_FILES['capalivro']);
    $livroDao = new LivroDao($pdo);
    $livroDao->update($livro, $_GET['id']);
    header("Location: index.php");
} ?>


<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1">Administrador</span>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href=" update.php?id=  ">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="update.php?id= ">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">

    <form method="POST" enctype="multipart/form-data">
        <h4>Atualize os dados!</h4>
        <div class="form-group">
            <div>
                <input type="text" class="form-control" name="nomeLivro" placeholder="Nome do Livro" value="<?= $livro->getNome() ?>">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="editora" placeholder="Editora" value="<?= $livro->getEditora() ?>">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="autor" placeholder="Autor(a)" value="<?= $livro->getAutor() ?>">
            </div>
            <br>
            <div class="form-group">
                <input type="date" class="form-control" name="dataLancamento" value="<?= date('Y-m-d', strtotime($livro->getdatalancamento())) ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="livro">Livro em pdf</label>
                <br>
                <input type="file" id="livro" class="form-control-file" name="livro">
                <?php if (!empty($livro->getCaminho())) : ?>
                    <p>Arquivo atual: <?= $livro->getCaminho() ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="genero" placeholder="Gênero" value="<?= $livro->getGenero() ?>">
            </div>
            <br>
            <div class="form-group">
                <input type="number" class="form-control" name="totalpaginas" placeholder="Total de Páginas" value="<?= $livro->getTotalDePaginas() ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="capa">Capa do Livro</label>
                <br>
                <input type="file" id="capa" class="form-control-file" name="capalivro">
                <?php if (!empty($livro->getCapa())) : ?>
                    <p>Arquivo atual: <?= $livro->getCapa() ?></p>
                <?php endif; ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar dados!</button>
            <a href="index.php"><button type="button" class="btn btn-danger">Voltar dados</button></a>
    </form>