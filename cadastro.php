<?php 
    require_once('Includes/header.php');
    require_once('Classes/Leitor.php');
    require_once('ClassesDAO/leitor-dao.php');
    require_once('Includes/connect.php');
    $nome = '';
    $username = '';
    $email = '';
    $contato = '';
    $idade = '';
    $senha = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contato = $_POST['contato'];
        $idade = $_POST['idade'];
        $senha = $_POST['senha'];

        $leitor = new Leitor($nome, $username, $email, $contato, $idade, password_hash($senha, PASSWORD_DEFAULT));
        $leitorDao = new LeitorDAO($pdo);
        $leitorDao->inserir($leitor);
        header("Location: index.php");
    }
?>

<div class="container">
  <form method="POST">
    <div class="mb-3">
      <label for="inputNome" class="form-label">Nome</label>
      <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Digite seu nome">
    </div>
    <div class="mb-3">
      <label for="inputUsername" class="form-label">Username</label>
      <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Digite seu username">
    </div>
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Digite seu email">
    </div>
    <div class="mb-3">
      <label for="inputContato" class="form-label">Contato</label>
      <input name="contato" type="text" class="form-control" id="inputContato" placeholder="Digite seu telefone ou celular">
    </div>
    <div class="mb-3">
      <label for="inputIdade" class="form-label">Idade</label>
      <input name="idade" type="number" class="form-control" id="inputIdade" placeholder="Digite sua idade">
    </div>
    <div class="mb-3">
      <label for="inputIdade" class="form-label">Senha</label>
      <input name="senha" type="password" class="form-control" id="inputIdade" placeholder="Digite sua idade">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>


<?php require_once('Includes/footer.php'); ?>