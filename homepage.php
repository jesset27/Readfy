<?php
require "src/Views/layout/header.php"; 
require "src/Lib/Session.php";
$session = new Session();
var_dump($session->obterValor("user"));
?>
<div class="container">
    <h1>Bem vindo</h1>
</div>
<?php require "src/Views/layout/footer.php";  ?>