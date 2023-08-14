<?php
require '../src/Models/ClassesDAO/LivroDao.php';
require '../src/Lib/connect.php';
require_once("../src/Lib/Session.php");

$livroDao = new LivroDAO($pdo);

$usuario = $livroDao->buscarUsuario(
    Session::obterValor('email')[1]
);

$livros = $livroDao->buscarTodos();

require_once('../src/Views/layout/headeradm.php');
?>
<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1"><?= $usuario->username; ?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href=" update.php?id= <?= $usuario->id ?> ">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="meu-perfil.php?id= <?= $usuario->id ?>">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">
    <h3>Livros</h3>




    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Editora</th>
                <th scope="col">Autor</th>
                <th scope="col">Data de Lançamento</th>
                <th scope="col">Data Atual</th>
                <th scope="col">Caminho</th>
                <th scope="col">Genero</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro) { ?>
                <tr>
                    <td scope="row" class="align-middle"><?= $livro['id'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['nome'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['editora'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['autor'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['datalancamento'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['dataatual'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['caminho'] ?></td>
                    <td scope="row" class="align-middle"><?= $livro['genero'] ?></td>
                    <td class="table-light" style="width:15%">
                        <a href="update.php?id=<?= $livro['id'] ?>"><button type="button" class="btn btn-primary">Alterar</button></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirma a exclusão de: <?= $leitor['nome'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Ao clicar em confirmar você concorda com a exclusão deste usuario?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="destroy_leitores.php?id=<?= $leitor['id'] ?>"><button type="button" class="btn btn-primary">Confirmar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
        </tbody>
    </table>



</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>