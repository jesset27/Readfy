<?php
require_once('../../../src/Models/ClassesDao/LivroDao.php');
require_once('../../../src/Lib/connect.php');
require_once('../../../src/Lib/Session.php');
require_once('../../../src/Models/Classes/Livro.php');
$session = new Session();
$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectById($_GET['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readfy</title>
    <link href="assets/stylegaleria.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="render-livro">
        
        <button id="back-page" class="button-5">
            Voltar
        </button>
        <iframe id="livro" height="700" width="900" src="<?= "../../../public/pdf/" . $livro->getcaminho() ?>">

        </iframe>
        <button id="next-page" class="button-5">
            Próxima
        </button>

        <a href="../../../galeria.php">
            <button id="back-page" class="button-6">
                Sair
            </button>
        </a>

    </div>
    <script>
        const ajax_livro = "http://localhost/readfy/aluno/sala/leitura/ajax-livros/"; //endpoint AJAX

        const livro_id = <?= $_GET['id'] ?>; // ID DO Livro
        const livro_totalpage = 10; // total de paginas do livro
        var current_page = 1; //pagina que sera renderizada no inicio
        var sala_id = 2; // ID DA SALA

        var send_time = false; //nao altere
        var livro_iframe = jQuery("#livro"); //nao altere    
    </script>
    <script src="assets/main.js" charset="UTF-8"></script>
</body>

</html>