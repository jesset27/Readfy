<?php
require "src/Views/layout/header.php"; 
session_start();

if (!isset($_SESSION['email'])){
    header('Location: index.php');
}else {
    require_once('Includes/connect.php');
    $stmt = $pdo->prepare("SELECT * FROM leitores WHERE email = :email");
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container">
    <h1>Bem vindo, <?= $user['username'] ?></h1>
</div>
<?php require "src/Views/layout/footer.php";  ?>