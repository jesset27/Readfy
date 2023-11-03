<?php
class ProfessorDao {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserir(Professor $professor) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO professor (
                nome, 
                username, 
                email,
                contato,
                idade,
                tipo,
                senha,
                data) 
            VALUES (
                :nome,
                :username,
                :email, 
                :contato,
                :idade,
                :tipo,
                :senha,
                :data
            )");

            $stmt->bindValue(':nome', $professor->getNome());
            $stmt->bindValue(':username', $professor->getUsername());
            $stmt->bindValue(":email", $professor->getEmail());
            $stmt->bindValue(':contato', $professor->getContato());
            $stmt->bindValue(':idade', $professor->getIdade());
            $stmt->bindValue(':tipo', $professor->getTipo());
            $stmt->bindValue(":senha", $professor->getSenha());
            $stmt->bindValue(':data', $professor->getData());

            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao inserir professor: ' . $e->getMessage();
        }
    }
    public function VerificaEmail($email)
    {

        $stmt = $this->pdo->prepare('SELECT * FROM professor WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $professor_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$professor_data) {
            // email não existe, cadastre    
            return true;
        } else {
            //email ja existe, não cadastre
            return false;
        }
    }

    
}
