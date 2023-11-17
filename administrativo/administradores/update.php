<?php
require_once('../../src/Lib/connect.php');
require_once('../../src/Lib/Session.php');
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Admin.php');
require_once('../../src/Models/ClassesDao/AdminDao.php');

$adminDao = new AdminDao($pdo);
$admin = $adminDao->selectById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminDao = new AdminDao($pdo);
    $admin->setNome($_POST['nome']);
    $admin->setEmail($_POST['email']);
    $admin->setSenha($_POST['senha']);
    $adminDao->update($admin, $_GET['id']);
    header("Location: index.php");
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

    <div class="container">
        <form method="POST">
            <h4>Atualize os dados</h4>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $admin->getNome() ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $admin->getEmail() ?>">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a nova senha!">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar dados!</button>
            <a href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>

        </form>
    </div>
</div>
</div>
</div>
<?php require "../../src/Views/layout/footer.php";  ?>