<?php
require_once("../src/Views/layout/headerprofessor.php");
require_once("../src/Models/ClassesDAO/SalaDao.php");
require_once("../src/Models/Classes/Sala.php");
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $senha = $_POST['senha'];

    $salaDao = new SalaDAO($pdo);
    $sala = new Sala($nome, $descricao, $senha);

    $salaDao->inserir($sala);
    header("Location: index.php");
}



?>
<div class="container">
    <h1>Adicionar Sala</h1>
    <form method="POST">
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Nome da Sala</label>
            <input name="nome" type="text" id="form2Example1" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Descrição</label>
            <input name="descricao" type="text" id="form2Example1" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Senha</label>
            <input name="senha" type="password" id="form2Example1" class="form-control" />
        </div>

        <input type="submit" value="Adicionar Sala">
    </form>
</div>