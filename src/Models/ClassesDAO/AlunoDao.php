<?php
class AlunoDao {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o modo de erro para exceções
    }

    public function inserir(Aluno $aluno) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO aluno (
                nome, 
                username, 
                email,
                contato,
                idade,
                tipo,
                senha
                ) 
            VALUES (
                :nome,
                :username,
                :email, 
                :contato,
                :idade,
                :tipo,
                :senha
                
            )");

            $stmt->bindValue(':nome', $aluno->getNome());
            $stmt->bindValue(':username', $aluno->getUsername());
            $stmt->bindValue(":email", $aluno->getEmail());
            $stmt->bindValue(':contato', $aluno->getContato());
            $stmt->bindValue(':idade', $aluno->getIdade());
            $stmt->bindValue(':tipo', $aluno->getTipo());
            $stmt->bindValue(":senha", $aluno->getSenha());
           

            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao inserir aluno: ' . $e->getMessage();
        }
    }
    public function VerificaEmail($email)
    {

        $stmt = $this->pdo->prepare('SELECT * FROM aluno WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $aluno_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$aluno_data) {
            // email não existe, cadastre    
            return true;
        } else {
            //email ja existe, não cadastre
            return false;
        }
    }
}
