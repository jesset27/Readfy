<?php require_once('../src/Views/layout/header.php');
require_once('../src/Models/Classes/Livro.php');
require_once('../src/Models/ClassesDAO/LivroDao.php');
require_once('../src/Lib/connect.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeLivro = $_POST['nomeLivro'];
    $editora = $_POST['editora'];
    $autor = $_POST['autor'];
    $dataLancamento = $_POST['dataLancamento'];
    $genero = $_POST['genero'];
    $totalPaginas = $_POST['totalPaginas'];
    $livroNome = '../public/pdf/' . $_FILES['livro']['name'];
    $capaLivroNome = '../public/img/capas/' . $_FILES['capaLivro']['name'];
    $livro = new Livro();
    $livroDao = new LivroDao($pdo);
    $livroDao->inserir($livro);
    $livroDao->UploadFiles($livroNome, $capaLivroNome);
}
?>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <h1>Cadastro de Livros</h1>
        <div class="form-group">
            <div>
                <input type="text" class="form-control" name="nomeLivro" placeholder="Nome do Livro">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="editora" placeholder="Editora">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="autor" placeholder="Autor(a)">
            </div>
            <br>
            <div class="form-group">
                <input type="date" class="form-control" name="dataLancamento">
            </div>
            <br>
            <div class="form-group">
                <label for="livro">Livro</label>
                <br>
                <input type="file" id="livro" class="form-control-file" name="livro">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="genero" placeholder="Gênero">
            </div>
            <br>
            <div class="form-group">
                <input type="number" class="form-control" name="totalPaginas" placeholder="Total de Páginas">
            </div>
            <br>
            <div class="form-group">
                <label for="capa">Capa do Livro</label>
                <br>
                <input type="file" id="capa" class="form-control-file" name="capaLivro">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php require_once("../src/Views/layout/footer.php"); ?>