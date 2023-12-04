<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Aluno.php');
require_once('../../src/Models/ClassesDao/AlunoDao.php');


$alunoDao = new AlunoDao($pdo);
$aluno = $alunoDao->selectById($_GET['id']);
$session = new Session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno->setNome($_POST['nome']);
    $aluno->setUsername($_POST['username']);
    $aluno->setEmail($_POST['email']);
    $aluno->setContato($_POST['contato']);
    $aluno->setIdade($_POST['idade']);
    if (!empty($_POST['senha'])) {
        $aluno->setSenha($_POST['senha']);
    }
    $alunoDao = new AlunoDao($pdo);
    $alunoDao->update($aluno, $_GET['id']);
    header("Location: index.php");
}?>


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
        <div class="container">
            <form method="POST">
                <h4>Atualizar dados de aluno!</h4>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="<?= $aluno->getNome() ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?= $aluno->getUsername() ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= $aluno->getEmail() ?>">
                </div>
                <div class="mb-3">
                    <label for="contato" class="form-label">Contato</label>
                    <input type="text" class="form-control" id="contato" name="contato" required value="<?= $aluno->getContato() ?>">
                </div>
                <div class="mb-3">
                    <label for="idade" class a="form-label">Idade</label>
                    <input type="number" class="form-control" id="idade" name="idade" required value="<?= $aluno->getIdade() ?>">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a nova senha!">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar Dados!</button>
            </form>
        </div>


    </div>
</div>
</div>
</div>
<?php require "../../src/Views/layout/footer.php";  ?>