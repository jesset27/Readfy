<?php
$id = $_GET['id'];

require_once('../src/Models/ClassesDAO/LeitorDao.php');
require_once('../src/Models/Classes/Leitor.php');
require_once('../src/Lib/connect.php');
require_once('../src/Views/layout/headeradm.php');
require_once("../src/Lib/Session.php");

$leitorDao = new LeitorDAO($pdo);
$leitor = $leitorDao->buscarPorId($id);
$usuario = $leitorDao->buscarUsuario(
    Session::obterValor('email')[1]
);



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

    <h3>Bem vindo, <?= $usuario->username ?></h3>
    <h3>Nome: <?= $usuario->nome ?></h3>
    <h3>E-mail: <?= $usuario->email ?></h3>
    <h3>Contato: <?= $usuario->contato ?></h3>
    <h3>Idade:, <?= $usuario->idade ?></h3>
    <h3>Data de Cadastro, <?= $usuario->data ?></h3>

</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>