<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Admin.php');
require_once('../../src/Models/ClassesDao/AdminDao.php');
$session = new Session();
if ($session->obter('administrador') == null) {
    header("Location: /readfy/login.php");
}

$adminDao = new AdminDao($pdo);
$admins = $adminDao->selectAll();
$session = new Session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $admin = new Admin();
    $admin->setNome($nome);
    $admin->setEmail($email);
    $admin->setSenha($senha);
    $adminDao = new AdminDao($pdo);
    if (!$adminDao->VerificaEmail($email)) {
        $adminDao->insert($admin);
        header("Location: index.php");
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
        <li><a class="dropdown-item" href="/readfy/src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">

    <div class="container">
        <table class="table table-hover">
            <caption>Administradores presentes no sistema.</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin) : ?>
                    <tr>
                        <th scope="row">
                            <?= $admin->getId(); ?>
                        </th>
                        <td>
                            <?= $admin->getNome(); ?>
                        </td>
                        <td>
                            <?= $admin->getEmail(); ?>
                        </td>
                        <td>
                            <a href="./update.php?id=<?= $admin->getId(); ?>">
                                <button class="btn btn-primary bi bi-pencil-square"></button>
                            </a>
                            <button class="bi bi-trash3-fill btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $admin->getId(); ?>"></button>
                        </td>
                    </tr>



                    <div class="modal fade" id="<?= $admin->getId(); ?>" tabindex="-1" aria-labelledby="<?= $admin->getId(); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="<?= $admin->getId(); ?>Label">Excluir Administrador?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir o administrador com o e-mail <?= $admin->getEmail(); ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                    <a href="./destroy.php?id=<?= $admin->getId(); ?>">
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
        <form method="POST">
            <h4>Cadastrar novos administradores!</h4>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="nome" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
</div>
</div>
<?php require "../../src/Views/layout/footer.php";  ?>