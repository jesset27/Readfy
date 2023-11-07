<?php




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
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MENU ANIMADO</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/style_professor.css'>
    <script src='main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="logo-professor">
        <a href=""> <img src=" "> </a>
    </div>

    <div class="container">

        <ul>
            <li style="--i: #353bf4; --j:#ea51ff">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Início
                    </span>
                </a>
            </li>
            <li style="--i: #70e094; --j:#99e599">
               <a href="#">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Galeria
                    </span>
               </a>
            </li>
            <li style="--i: #ff9966; --j:#ff5e62">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Criar Sala
                    </span>
                </a>
            </li>
            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Perfil
                    </span>
                </a>  
                
            </li>
        </ul>
    </div>

    <div class="box">
        <div class="container3">
            <div class="top-header">

                <header>Criar sala</header>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <label>Selecione o livro</label>
                    <select name="livros_id" class="form-select" id="livros_id" placehorder='Selecionar livro' required>
                    </select>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" id="pg_inicial" name="pag_inicial"
                        placeholder="Digite a pagina inicial de leitura" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="e-mail" class="input" id="pg_final" name="pg_final"
                        placeholder="Digite a pagina final de leitura" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="tel" class="input" id="codigo" name="codigo" placeholder="Digite o codigo da sala"
                        required placeholder=" Digite o codigo da sala" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="CRIAR SALA">
                </div>
        </div>

        </form>
    </div>
    </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>