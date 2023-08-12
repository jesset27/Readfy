<?php
require_once("../src/Views/layout/header.php");
require_once("../src/Models/ClassesDAO/LeitorDao.php");
require_once("../src/Models/ClassesDAO/LivroDao.php");
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");

$leitorDao = new LeitorDAO($pdo);
$livroDao = new LivroDAO($pdo);

$usuario = $leitorDao->buscarUsuario(
  Session::obterValor('email')[1]
);

$livros = $livroDao->buscarTodos();

?>
<div class="container">
  <h1>Fantasia</h1>
  <div class="movies">
    <?php foreach ($livros as $livro) { ?>

      <img src="<?= $livro['caminho'] ?>" alt="" data-bs-toggle="modal" data-bs-target="#modal<?= $livro['id'] ?>">
      <!-- Modal -->
      <div class="modal fade" id="modal<?= $livro['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel<?= $livro['id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalLabel<?= $livro['id'] ?>"><?= $livro["nome"] ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Editora: <?= $livro["editora"] ?></p>
              <p>Autor: <?= $livro["autor"] ?></p>
              <p>Data de Lançamento: <?= $livro["datalancamento"] ?></p>
              <p>Gênero: <?= $livro["genero"] ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <a href=""><button type="button" class="btn btn-primary">Ler</button></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->


    <?php } ?>
  </div>

</div>
<?php require "../src/Views/layout/footer.php";  ?>