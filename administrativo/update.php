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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $idade = $_POST['idade'];
    $leitorDao->atualizar($id, $nome, $username, $email, $contato, $idade);
}
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


    <form method="POST">
        <div class="mb-3">
            <label for="inputNome" class="form-label">Nome</label>
            <input value="<?= $leitor['nome'] ?>" name="nome" type="text" class="form-control" id="inputNome" placeholder="Digite seu nome">
        </div>
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input value="<?= $leitor['username'] ?>" name="username" type="text" class="form-control" id="inputUsername" placeholder="Digite seu username">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input value="<?= $leitor['email'] ?>" name="email" type="email" class="form-control" id="inputEmail" placeholder="Digite seu email">
        </div>
        <div class="mb-3">
            <label for="inputContato" class="form-label">Contato</label>
            <input value="<?= $leitor['contato'] ?>" name="contato" type="text" class="form-control" id="inputContato" placeholder="Digite seu telefone ou celular">
        </div>
        <div class="mb-3">
            <label for="inputIdade" class="form-label">Idade</label>
            <input value="<?= $leitor['idade'] ?>" value="<?= $leitor['nome'] ?>" name="idade" type="number" class="form-control" id="inputIdade" placeholder="Digite sua idade">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>