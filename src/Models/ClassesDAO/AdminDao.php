<?php
class AdminDao{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function inserir(Admin $admin){
        $stmt = $this->pdo->prepare("INSERT INTO admin (nome, email, senha) 
        VALUES (:nome, :email, :senha)");
        $stmt->bindValue(':nome', $admin->getNome());
        $stmt->bindValue(":email", $admin->getEmail());
        $stmt->bindValue(":senha", $admin->getsenha());
        $stmt->execute();
        $this->pdo = null;
    }
    public function VerificaEmail($email)
    {

        $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $leitor_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$leitor_data) {
            // email não existe, cadastre    
            return true;
        } else {
            //email ja existe, não cadastre
            return false;
        }
    }
}