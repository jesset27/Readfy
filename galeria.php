<?php
require_once "../Readfy/src/Models/Classes/Livro.php";
require_once "../Readfy/src/Lib/connect.php";
require_once "../Readfy/src/Lib/Session.php";
require_once "../Readfy/src/Models/ClassesDAO/LivroDao.php";

// criando variável
$generos = "";

//Instância classe
$livroDao = new LivroDao($pdo);

//Usando o método da classe LivroDao
$generos = $livroDao->getGenerosOrdenados();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Livros</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\style_galeria.css">
</head>

<body>
    <header class="header">

        <div class="logo">
            <img src="\Readfy\public\img\logo6.png ">
        </div>

        <nav class="navbar">

            <nav class="navbar">
                <div class="dropdown">
                    <button class="dropbtn">Categorias</button>
                    <div class="dropdown-content">
                        <?php foreach ($generos as $genero) : ?>
                            <a href="#<?php echo $genero?>"><?php echo htmlspecialchars($genero); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <a href="sobre.php">Sair</a>
                
            </nav>
    </header>

            <!-- Exibição dinâmica de livros por gênero -->
            <?php foreach ($generos as $genero) : ?>
                <div class="container mt-5">
                    <h2 id="<?php echo $genero ?>" class="mb-4"><?php echo htmlspecialchars($genero); ?></h2>
                    <div class="row">
                      <?php $livrosParaGenero = $livroDao->getLivrosPorGenero($genero);?>
                        <?php foreach ($livrosParaGenero as $livro) : ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src= "<?= "../Readfy/public/img/capas/" . $livro->getCapa() ?>" alt="";>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $livro->getNome(); ?></h5>
                                        <!-- <a href="#" class="btn btn-primary">Ler</a> -->
                                        <a href=" <?= "./aluno/sala/leitura/leitura_galeria.php?id=".$livro->getId();?>" class="btn btn-primary"> Ler </a>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Inclua os arquivos JavaScript do Bootstrap (opcional) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>