<?php
require_once('Includes/header.php');
session_start();
if (!isset($_SESSION['email'])){
    header('Location: index.php');
}else {
    require_once('Includes/connect.php');
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM leitores");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
}
?>
<div class="container">
    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Total de Leitores</h1>
                <?= var_dump($user); ?>
                </div>
                <div class="col">
                    Livros
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('Includes/footer.php'); ?>