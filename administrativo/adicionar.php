<?php
require '../src/Models/ClassesDAO/LivroDao.php';
require '../src/Models/ClassesDAO/GeneroDao.php';
require '../src/Models/Classes/Livro.php';
require '../src/Models/Classes/Genero.php';
require '../src/Lib/connect.php';
require_once("../src/Lib/Session.php");
require '../src/Models/ClassesDAO/LeitorDao.php';


$leitorDao = new LeitorDAO($pdo);

$usuario = $leitorDao->buscarUsuario(
    Session::obterValor('email')[1]
);

$livroDao = new LivroDAO($pdo);

$generoDao = new GeneroDao($pdo);
$generos = $generoDao->bucarGeneros();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $editora = $_POST["editora"];
    $autor = $_POST["autor"];
    $datalancamento = $_POST["datalancamento"];
    $genero = $_POST["genero"];
    
    
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
        $nome_temporario = $_FILES["imagem"]["tmp_name"];
        $nome_arquivo = $_FILES["imagem"]["name"];
        // Você pode definir uma pasta para salvar o arquivo
        $pasta_destino = "../public/img/capas/" . $nome_arquivo;
        
        // Mova o arquivo temporário para a pasta de destino
        if (move_uploaded_file($nome_temporario, $pasta_destino)) {
            $livro = new Livro($nome, $editora, $autor, $datalancamento, $pasta_destino, $genero);
            $livroDao->inserir($livro);
            echo "Arquivo enviado com sucesso!";
            var_dump($_POST); // Dump the contents of $_POST to see what data is being submitted.

        } else {
            echo "Erro ao enviar o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}


require_once('../src/Views/layout/headeradm.php');
?>
<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1"><?= $usuario->username; ?></span>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href=" update.php?id= <?= $usuario->id ?> ">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="meu-perfil.php?id= <?= $usuario->id ?>">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">
    <h3>Cadastro de Livros</h3>


    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="inputNome" class="form-label">Nome</label>
            <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Digite o nome do Livro" required>
        </div>
        <div class="mb-3">
            <label for="editora" class="form-label">Editora</label>
            <input name="editora" type="text" class="form-control" id="editora" placeholder="Editora" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input name="autor" type="text" class="form-control" id="autor" placeholder="Autor" required>
        </div>
        <div class="mb-3">
            <label for="datalancamento" class="form-label">Data de Lançamento</label>
            <input name="datalancamento" type="date" class="form-control" id="datalancamento" placeholder="Data de Lançamento" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem do Livro</label>
            <input name="imagem" type="file" class="form-control" id="imagem" placeholder="Imagem do Livro" required>
        </div>

        <label for="genero" class="form-label">Selecione o Gênero</label>
        <select name="genero" class="form-select" aria-label="Default select example" id="genero" required >
            <option selected>Open this select menu</option>
            <?php foreach ($generos as $genero) { ?>
            <option value="<?= $genero["nome"] ?>"><?= $genero["nome"] ?></option>
            <?php } ?>
        </select>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>