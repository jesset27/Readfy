<?php
require_once('./vendor/autoload.php');
require_once('../../Models/Classes/Aluno.php');
require_once('../../Models/ClassesDAO/AlunoDao.php');
require_once('../connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function gerarToken()
{
    return bin2hex(random_bytes(32));
}

function enviarEmailRecuperacao($emailDestinatario, $linkRecuperacao)
{
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';  // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nao-responda@readfy.com.br';  // Substitua pelo seu username
        $mail->Password   = 'Readfy67592@';  // Substitua pela sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;  // Porta TCP para conectar, use 465 para SMTPS

        // Recipientes
        $mail->setFrom('nao-responda@readfy.com.br', 'Readfy');
        $mail->addAddress($emailDestinatario);  // Adicione o email do destinatário

        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Redefinir senha!';
        $mensagem = "<h1>Redefinição de Senha</h1>
        <p>Recebemos uma solicitação para redefinir a senha da sua conta.</p>
        <p>Por favor, clique no link abaixo para definir uma nova senha:</p>
        <a href='{$linkRecuperacao}'>Redefinir Senha</a>
        <p>Se você não solicitou esta redefinição, por favor ignore este email.</p>";
        $mail->Body    = $mensagem;

        $mail->send();
        
    } catch (Exception $e) {
        echo "Erro: {$mail->ErrorInfo}";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alunoDao = new AlunoDao($pdo);
    $result = $alunoDao->emailVerifyRecover($_POST['email']);
    if ($result) {
        $token = gerarToken();

        session_start();

        $_SESSION['token'] = $token;
        $link = 'localhost/readfy/newpassword.php?token=' . $token . '&id=' . $result->getId();
        enviarEmailRecuperacao($_POST['email'], $link);
        echo "<div class='alert alert-success' role='alert' style='width: 50%; margin: 0 auto;'>
        Seu email de recuperação de senha foi enviado com sucesso. Verifique sua caixa de entrada (e a pasta de spam, se necessário) para prosseguir com a redefinição de senha.
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert' style='width: 50%; margin: 0 auto;'>
                Por favor, verifique seu e-mail e tente novamente!
            </div>";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Redefinir Senha!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Redefinir Senha</h2>
                <br>
                <form method="POST">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="email" name="email" required placeholder="Digite seu email">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>