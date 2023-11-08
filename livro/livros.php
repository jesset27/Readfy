<?php require_once('../src/Views/layout/header.php');

require_once('../src/Models/ClassesDAO/LivroDao.php');
require_once('../src/Lib/connect.php');
$livroDao = new LivroDAO($pdo);

$livros = $livroDao->selectAll();
?>

<br>
<div class="container text-light">
    <h2>LIVROS EM DESTAQUE </h2>
</div>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Editora</th>
                <th scope="col">Autor</th>
                <th scope="col">Data de Lançamento</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col">Caminho</th>
                <th scope="col">Genero</th>
                <th scope="col">Total de Paginas</th>
                <th scope="col">Capa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro) { ?>
                <tr>
                    <th scope="row"><?= $livro['id']; ?></th>
                    <td><?= $livro['nome']; ?></td>
                    <td><?= $livro['editora']; ?></td>
                    <td><?= $livro['autor']; ?></td>
                    <td><?= date('d/m/Y', strtotime($livro['datalancamento'])); ?></td>
                    <td><?= date('d/m/Y', strtotime($livro['dataatual'])); ?></td>
                    <td><?= $livro['caminho']; ?></td>
                    <td><?= $livro['genero']; ?></td>
                    <td><?= $livro['total_paginas']; ?></td>
                    <td><?= $livro['capa']; ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once("../src/Views/layout/footer.php"); ?>