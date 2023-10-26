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
        <a href="home.php"><img src="\readfy\public\img\logo5.png"> </a>
    </div>
    <div class="btn_login">                                                                                                                          
        <a href="login.php">
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
                <label>Tipo de usuario</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Professor
                    <label class="form-check-label" for="radio1"></label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Aluno
                    <label class="form-check-label" for="radio2"></label>
                </div>

                <div class="input-field">
                    <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="CRIAR CONTA">
                </div>


                <!-- <div class="bottom">
                    <div class="left">
                        <input type="checkbox" id="check">
                        <label for="check">Lembrar senha</label>
                    </div>

                    <div class="right">
                        <label><a href="#"> Esqueceu a senha?</a></label>

                    </div>
                </div> -->
            </div>
        </div>
    </div>


</body>

</html>