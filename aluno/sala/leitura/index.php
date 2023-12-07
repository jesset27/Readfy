<?php
require_once('../../../src/Models/ClassesDao/LivroDao.php');
require_once('../../../src/Lib/connect.php');
require_once('../../../src/Lib/Session.php');
$session = new Session();
$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectByIdSalaLivro($_GET['id']);
$pgAtual = $session->obter("pagina_atual");
if ($pgAtual == null) {
    $pgAtual = 1;
}
$pgInicialFinal = $livroDao->getPgInicialFinal($_GET['id']);
<<<<<<< HEAD


=======
var_dump($pgInicialFinal);
>>>>>>> 8ca12033a9c5863b9359ef82ae4accbd8a16ba68
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contabilização de leitura por tempo de acesso</title>
    <link href="assets/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    </script>
    <div class="render-livro">
        <button id="back-page" class="button-5">
            Voltar
        </button>
        <iframe id="livro" height="700" width="900" src="livros/exemplo.pdf">

        </iframe>
        <button id="next-page" class="button-5">
            Próxima
        </button>

        

    </div>
        <a href="/readfy/aluno/index.php">
            <button id="back-page" class="button-6">
                Sair
            </button>
        </a>



    <script>
        const ajax_livro = "http://localhost/readfy/aluno/sala/leitura/ajax-livros/"; //endpoint AJAX

        const livro_id = <?= $livro['livro_id'] ?>; // ID DO Livro
        const livro_totalpage = <?= $pgInicialFinal['pagina_final'] ?>; // total de paginas do livro
        var current_page = <?= 5   ?>; //pagina que sera renderizada no inicio
        var sala_id = <?= $_GET['id'] ?> // ID DA SALA

        var send_time = false; //nao altere
        var livro_iframe = jQuery("#livro"); //nao altere    
    </script>
    <script src="assets/script.js" charset="UTF-8"></script>

</body>

</html>