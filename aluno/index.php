<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>READFY</title>
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
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Perfil
                    </span>
                </a>
            </li>
            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="exit-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Sair
                    </span>
                </a>  
                
            </li>
        </ul>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <div class="box">
        <div class="container3">
            <div class="top-header">

                <header>Entrar sala</header>
            </div>
            <form action="" method="post">
            
                <div class="input-field">
                    <input type="tel" class="input" id="codigo" name="codigo" placeholder="Digite o codigo da sala"
                        required placeholder=" Digite o Código da sala" required>
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value=" ENTRAR">
                </div>
        </div>

        </form>
    </div>

    <div class="container">
    <h1> Salas de Leitura:</h1>
     <!-- <?php foreach ($salas as $sala) { ?>  -->
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


</body>    