<?php
require_once("../src/Views/layout/headerprofessor.php");
require_once("../src/Models/ClassesDAO/SalaDao.php");
require_once("../src/Models/Classes/Sala.php");
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");

$salaDao = new SalaDAO($pdo);
// $sala = new Sala("ADS 1", "Analise e Desenvolvimento de Sistemas", "1234");
// $salaDao->inserir($sala);
$salas = $salaDao->buscarTodos();



?>

<div class="container">
    <h1>Salas Existentes:</h1>
    <?php foreach ($salas as $sala) { ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Nome da Sala: <?= $sala['nome'] ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Senha: <?= $sala['senha'] ?></h6>
                <p class="card-text">Descrição: <?= $sala['descricao'] ?></p>
                <a href="#" class="card-link">Exibir</a>
                <a href="#" class="card-link">Alterar</a>
                <a href="#" class="card-link"><img src="../public/img/icons/trash.svg" alt=""></a>
            </div>
        </div>
        <br>
    <?php } ?>

</div>
<?php 
    require_once("../src/Views/layout/footer.php");
?>