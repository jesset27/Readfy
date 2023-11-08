<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Professor.php');
require_once('../../src/Models/ClassesDao/ProfessorDao.php');


$professorDao = new ProfessorDao($pdo);
$professor = $professorDao->selectById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $professor->setNome($_POST['nome']);
    $professor->setUsername($_POST['username']);
    $professor->setEmail($_POST['email']);
    $professor->setContato($_POST['contato']);
    $professor->setIdade($_POST['idade']);
    if (!empty($_POST['senha'])) {
        $professor->setSenha($_POST['senha']);
    }
    $professorDao = new ProfessorDao($pdo);
    $professorDao->update($professor, $_GET['id']);
    header("Location: index.php");  
}?>


<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1">Professor</span>
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
        <div class="container">
            <form method="POST">
                <h4>Atualizar professor!</h4>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="<?= $professor->getNome() ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?= $professor->getUsername() ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= $professor->getEmail() ?>">
                </div>
                <div class="mb-3">
                    <label for="contato" class="form-label">Contato</label>
                    <input type="text" class="form-control" id="contato" name="contato" required value="<?= $professor->getContato() ?>">
                </div>
                <div class="mb-3">
                    <label for="idade" class a="form-label">Idade</label>
                    <input type="number" class="form-control" id="idade" name="idade" required value="<?= $professor->getIdade() ?>">
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