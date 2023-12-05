<?php
$id = $_GET['id'];

require_once('../src/Lib/connect.php');
require_once('../src/Views/layout/headeradm.php');
require_once("../src/Lib/Session.php");
require_once("../src/Models/Classes/Admin.php");
require_once("../src/Models/ClassesDAO/AdminDao.php");
$session = new Session();
if ($session->obter('administrador') == null) {
    header("Location: /readfy/login.php");
}



$adminDao = new AdminDao($pdo);
$admin = $adminDao->selectById($session->obter('administrador'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin->setNome($_POST['nome']);
    $admin->setEmail($_POST['email']);

    if (!empty($_POST['senha'])) {
        $admin->setSenha($_POST['senha']);
    }

    $adminDao->update($admin, $_GET['id']);
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
        <li><a class="dropdown-item" href="/readfy/administrativo/update.php?id=<?=$session->obter('administrador') ?>">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="/readfy/administrativo/meu-perfil.php?id=">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="/readfy/src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">
    <h3>Meu Perfil</h3>


    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input disabled value="<?= $admin->getNome() ?>" name="nome" type="text" class="form-control" placeholder="Digite seu nome">
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input disabled value="<?= $admin->getEmail() ?>" name="email" type="email" class="form-control" placeholder="Digite seu email">
        </div>
    </form>


</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>