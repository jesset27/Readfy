<?php 
    require_once('Includes/header.php');
    require_once('Classes/Leitor.php');
    require_once('ClassesDAO/leitor-dao.php');
    require_once('Includes/connect.php');

    $email = '';    
    $senha = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare('SELECT email, senha FROM leitores WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $login = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($login && password_verify($senha, $login['senha'])){
            

        }else {
            echo 'Email ou senha incorretos';
        }
    }

?>

<div class="container">
    <form method="POST" class="border p-3 rounded">
        <h1 class="text-center mb-4">Login</h1>
        <div class="mb-3">
            <label for="username" class="form-label">E-mail</label>
            <input name="email" type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input name="senha" type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>


<?php require_once('Includes/footer.php'); ?>