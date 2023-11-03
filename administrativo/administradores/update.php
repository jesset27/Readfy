<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Admin.php');
require_once('../../src/Models/ClassesDao/AdminDao.php');


$adminDao = new AdminDao($pdo);
$admin = $adminDao->selectById($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin = new Admin();
    $admin->setName($name);
    $admin->setEmail($email);
    $admin->setPassword($password);
    $adminDao = new AdminDao($pdo);
    $adminDao->update($admin, $_GET['id']);
    header("Location: index.php");
}
?>


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

    <div class="container">
        <form method="POST">
            <h4>Atualize os dados</h4>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="name" class="form-control" id="name" name="name" value="<?= $admin->getName() ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $admin->getEmail() ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite a nova senha!">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar dados!</button>
            <a href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>

        </form>
    </div>
</div>
</div>
</div>
<?php require "../../src/Views/layout/footer.php";  ?>