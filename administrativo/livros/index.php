<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Livro.php');
require_once('../../src/Models/ClassesDao/LivroDao.php');

$genero="";

$livroDao = new LivroDao($pdo);
$livros = $livroDao->selectAll();
$session = new Session();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livro = new Livro();
    $livro->setNome($_POST['nomeLivro']);
    $livro->setEditora($_POST['editora']);
    $livro->setAutor($_POST['autor']);
    $livro->setDataLancamento($_POST['dataLancamento']);
    $genero = ucfirst(strtolower($_POST['genero']));
    $livro->setGenero($genero);
    $livro->setTotalDePaginas($_POST['totalPaginas']);
    $livroNome = basename($_FILES['livro']['name']);
    $capaLivroNome = basename($_FILES['capaLivro']['name']);
    $livro->setCaminho($livroNome);
    $livro->setCapa($capaLivroNome);
    $livroDao = new LivroDao($pdo);
    if ($livroDao->UploadFiles($livroNome, $capaLivroNome)) {
        $livroDao->insert($livro);
        header('Location: index.php');
    }
}

?>


<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="d-none d-sm-inline mx-1">
            <i class="bi bi-person-circle"></i> 
            Administrador
        </span>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
    <li><a class="dropdown-item" href="../update.php?id=<?=$session->obter('administrador') ?>">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="../meu-perfil.php?id=<?=$session->obter('administrador') ?>">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">

    <div class="container">
        <table class="table table-hover">
            <caption>Livros presentes no sistema.</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data de Lançamento</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Total de Páginas</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro) : ?>
                    <tr>
                        <th scope="row">
                            <?= $livro->getId(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getNome(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getEditora(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getAutor(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getdatalancamento(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getDataatual(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getGenero(); ?>
                        </th>
                        <th scope="row">
                            <?= $livro->getTotalDePaginas(); ?>
                        </th>
                        <td>
                            <a href="./update.php?id=<?= $livro->getId(); ?>">
                                <button class="btn btn-primary bi bi-pencil-square"></button>
                            </a>
                            <button class="btn btn-danger bi bi-trash3-fill" data-bs-toggle="modal" data-bs-target="#<?= $livro->getId(); ?>"></button>
                        </td>
                    </tr>



                    <div class="modal fade" id="<?= $livro->getId(); ?>" tabindex="-1" aria-labelledby="<?= $livro->getId(); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="<?= $livro->getId(); ?>Label">Excluir Administrador?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir o livro <?= $livro->getNome(); ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                    <a href="./destroy.php?id=<?= $livro->getId(); ?>">
                                        <button type="button" class="btn btn-danger">Sim</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <form method="POST" enctype="multipart/form-data">
            <h4>Cadastrar novos livros!</h4>
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
</div>
</div>
</div>
<?php require_once("../../src/Views/layout/footer.php");  ?>