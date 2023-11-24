<?php
require_once('../../../src/Models/ClassesDao/LivroDao.php');
require_once('../../../src/Lib/connect.php');
$livroDao = new LivroDao($pdo);
$livro = $livroDao->selectByIdSalaLivro($_GET['id'])['livro_id'];
var_dump($livro);
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
        <iframe  id="livro" height="500" width="800" src="livros/exemplo.pdf">

        </iframe>
        <button id="next-page" class="button-5">
            Próxima
        </button>
    </div>
<script>
const ajax_livro = "http://localhost/readfy/aluno/sala/leitura/ajax-livros/"; //endpoint AJAX

const livro_id = <?= $livro ?>; // ID DO Livro
const livro_totalpage = 14; // total de paginas do livro
var current_page = 1; //pagina que sera renderizada no inicio
var sala_id =  1 // ID DA SALA

var send_time = false; //nao altere
var livro_iframe = jQuery("#livro"); //nao altere    

 
</script>
<script src="assets/script.js" charset="UTF-8"></script>

</body>
</html>