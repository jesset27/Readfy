<!-- <?php
require_once "../src/Models/Classes/Livro.php";
require_once "../src/Models/ClassesDAO/LivroDao.php";

require_once "../src/Models/Classes/Sala.php";
require_once "../src/Models/ClassesDAO/SalaDao.php";
require_once "../src/Lib/connect.php";

require_once "../src/Lib/Session.php";
$session = new Session();
if ($session->obter('professor') == null) {
    header("Location: ../login.php");
}

$salaDao = new SalaDao($pdo);
$sala = $salaDao->selectById($_GET['id']);

$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectById($sala->getLivrosId());

$salaDao = new SalaDao($pdo);
$sal = $salaDao->mostrarAlunoSala($_GET['id']);
?> -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/salastyle.css'>

    <title>Sala Professor</title>
</head>
<style>
    .progress {
        background-color: #FFA500;
        border-radius: 10px;
        height: 20px;
        width: 200px;
        
    }

    .progress-bar {
        background-color: #007bff;
        height: 100%;
        text-align: center;
        color: white;
        line-height: 20px;
        /* Altura da barra para centralizar o texto */
    }

    .texto {
        color: #333333;
    }

    .alunos {
        /* border: 2px solid #333333; */
        width: 80%;
        margin-left: 22%;
        margin-top: -42%;
    }

    .professor_container {

        width: 38%;
    }

    .livro {
        margin-left: 2%;
    }

    .text-center {
        color: #333333;
    }
   .container{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top:-85px;
   }

   .card{
    width: 230px;
   }

   .fechar img{
        width: 40px;
   }

   .fechar{
    text-align: right;  
    margin-top: -50px;
   }
   .logo{
    margin-top: 10px;
   }
   body{
    background-color: f5f5f5f5;
   }

</style>

<body>

    <img class="logo" src="../../public/img/logo6.png" alt="">
    <div class="fechar"><img src="\readfy\public\img\fechar.png"></div>
    <div class="professor_container">
        <br><br>
        <div class="professor">
            <div class="livro">
                <img class="logo" src="<?= "../../public/img/capas/" . $livro->getCapa() ?>" alt="">
                <br>
                <p class="texto"><strong>Nome do livro: <?= $livro->getNome() ?></strong></p>
                <p class="texto"><strong>Prazo de leitura até : <?= $sala->getPrazo(); ?></strong></p>
            </div>
        </div>
    </div>
</body>