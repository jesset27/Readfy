<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readfy/public/css/style_cadastro.css">
    <title>Cadastro usuario</title>
</head>

<body>

    <div class="logo">
        <a href="../index.php"><img src="\readfy\public\img\logo5.png"> </a>
    </div>
    <div class="btn_login">                                                                                                                          
        <a href="../login.php">
            <input type="submit" class="submit" value="ENTRAR">
        </a>
    </div>
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Crie o seu perfil</header>
            </div>


            <div class="input-field">
                <input type="text" class="input" id="nome" name="nome" placeholder="Nome" required>
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="input-field">
                <input type="text" class="input" id="apelido" name="apelido" placeholder="apelido" required>
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="input-field">
                <input type="e-mail" class="input" id="e-mail" name="e-mail" placeholder="E-mail" required>
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="input-field">
                <input type="tel" class="input" id="telefone" name="telefone" pattern="\d{2}-\d{5}-\d{4}" placeholder="Telefone/Celular" required placeholder=" Digite seu telefone" required>
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="input-field">
                <input type="number" class="input" id="idade" name="idade" placeholder="Digite sua idade" required>
                <i class="fa-regular fa-envelope"></i>
            </div><br>
            <div class="tpuser">
                
                <div class="input-field">
                    <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="CRIAR CONTA">
                </div>


        
            </div>
        </div>
    </div>


</body>

</html>