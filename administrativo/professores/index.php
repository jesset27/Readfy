<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Professor.php');
require_once('../../src/Models/ClassesDao/ProfessorDao.php');


$professorDao = new ProfessorDao($pdo);
$professores = $professorDao->selectAll();
$session = new Session();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $professor = new Professor();
    $professor->setNome($_POST['nome']);
    $professor->setUsername($_POST['username']);
    $professor->setEmail($_POST['email']);
    $professor->setContato($_POST['contato']);
    $professor->setIdade($_POST['idade']);
    $professor->setTipo('professor');
    $professor->setSenha($_POST['senha']);
    $professorDao = new ProfessorDao($pdo);
    if (!$professorDao->VerificaEmail($email)) {
        $professorDao->insert($professor);
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
            <caption>Professores presentes no sistema.</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Username</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor) : ?>
                    <tr>
                        <th scope="row">
                            <?= $professor->getId(); ?>
                        </th>
                        <td>
                            <?= $professor->getNome(); ?>
                        </td>
                        <td>
                            <?= $professor->getUsername(); ?>
                        </td>
                        <td>
                            <?= $professor->getEmail(); ?>
                        </td>
                        <td>
                            <?= $professor->getContato(); ?>
                        </td>
                        <td>
                            <?= $professor->getIdade(); ?>
                        </td>
                        <td>
                            <?= $professor->getTipo(); ?>
                        </td>
                        <td>
                            <?= $professor->getData(); ?>
                        </td>
                        <td>
                            <a href="./update.php?id=<?= $professor->getId(); ?>">
                                <button class="btn btn-primary bi bi-pencil-square"></button>
                            </a>
                            <button class="btn btn-danger bi bi-trash3-fill" data-bs-toggle="modal" data-bs-target="#<?= $professor->getId(); ?>"></button>
                        </td>
                    </tr>



                    <div class="modal fade" id="<?= $professor->getId(); ?>" tabindex="-1" aria-labelledby="<?= $professor->getId(); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="<?= $professor->getId(); ?>Label">Excluir Administrador?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir o professor com o e-mail <?= $professor->getEmail(); ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                    <a href="./destroy.php?id=<?= $professor->getId(); ?>">
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
            <h4>Cadastrar novos professores!</h4>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" required>
            </div>
            <div class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" required>
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