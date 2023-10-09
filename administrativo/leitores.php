<?php
require '../src/Models/ClassesDAO/LeitorDao.php';
require '../src/Lib/connect.php';
require_once("../src/Lib/Session.php");

$leitorDao = new LeitorDAO($pdo);

$usuario = $leitorDao->buscarUsuario(
    Session::obterValor('email')[1]
);

$leitores = $leitorDao->buscarTodos();

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
    <h3>Leitores</h3>




    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Username</th>
                <th scope="col">E-mail</th>
                <th scope="col">Contato</th>
                <th scope="col">Idade</th>
                <th scope="col">Data</th>
                <th scope="col">Tipo</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leitores as $leitor) { ?>
                <tr>
                    <td scope="row" class="align-middle"><?= $leitor['id'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['nome'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['username'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['email'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['contato'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['idade'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['data'] ?></td>
                    <td scope="row" class="align-middle"><?= $leitor['tipo'] ?></td>
                    <td class="table-light" style="width:15%">
                        <a href="update.php?id=<?= $leitor['id'] ?>"><button type="button" class="btn btn-primary">Alterar</button></a>
<<<<<<< Updated upstream
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $leitor['id'] ?>">
                            Excluir
                        </button>
=======
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $leitor['id'] ?>">
                Excluir
            </button>
>>>>>>> Stashed changes
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal<?= $leitor['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $leitor['id'] ?>" aria-hidden="true">
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