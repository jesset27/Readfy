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
    <title>Contabilização de leitura por tempo de acesso</title>
    <link href="assets/stylegaleria.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    </script>
    <div class="render-livro">
        <a href="../../../galeria.php">
            <button id="back-page" class="button-5">
              Voltar
            </button>
        </a>
        <iframe  id="livro" height="630" width="1100" src="<?="../../../public/pdf/". $livro->getcaminho()?>">

        </iframe>
          
    </div>
</script>

</body>
</html>