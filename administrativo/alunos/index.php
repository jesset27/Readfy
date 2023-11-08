<?php
require '../../src/Lib/connect.php';
require_once("../../src/Lib/Session.php");
require_once('../../src/Views/layout/headeradm.php');
require_once('../../src/Models/Classes/Aluno.php');
require_once('../../src/Models/ClassesDao/AlunoDao.php');


$alunoDao = new AlunoDao($pdo);
$alunos = $alunoDao->selectAll();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno = new Aluno();
    $aluno->setNome($_POST['nome']);
    $aluno->setUsername($_POST['username']);
    $aluno->setEmail($_POST['email']);
    $aluno->setContato($_POST['contato']);
    $aluno->setIdade($_POST['idade']);
    $aluno->setTipo('aluno');
    $aluno->setSenha($_POST['senha']);
    $alunoDao = new AlunoDao($pdo);
    if (!$alunoDao->VerificaEmail($_POST['email'])) {
        $alunoDao->insert($aluno);
        header("Location: index.php");
    }
}
?>


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
        <table class="table table-hover">
            <caption>Alunos presentes no sistema.</caption>
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
                <?php foreach ($alunos as $aluno) : ?>
                    <tr>
                        <th scope="row">
                            <?= $aluno->getId(); ?>
                        </th>
                        <td>
                            <?= $aluno->getNome(); ?>
                        </td>
                        <td>
                            <?= $aluno->getUsername(); ?>
                        </td>
                        <td>
                            <?= $aluno->getEmail(); ?>
                        </td>
                        <td>
                            <?= $aluno->getContato(); ?>
                        </td>
                        <td>
                            <?= $aluno->getIdade(); ?>
                        </td>
                        <td>
                            <?= $aluno->getTipo(); ?>
                        </td>
                        <td>
                            <?= $aluno->getData(); ?>
                        </td>
                        <td>
                            <a href="./update.php?id=<?= $aluno->getId(); ?>">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $aluno->getId(); ?>">Deletar</button>
                        </td>
                    </tr>



                    <div class="modal fade" id="<?= $aluno->getId(); ?>" tabindex="-1" aria-labelledby="<?= $aluno->getId(); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="<?= $aluno->getId(); ?>Label">Excluir Administrador?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir o aluno com o e-mail <?= $aluno->getEmail(); ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                    <a href="./destroy.php?id=<?= $aluno->getId(); ?>">
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
            <h4>Cadastrar novos alunos!</h4>
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