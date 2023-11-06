<?php
class AdminDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function insert(Admin $admin)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO admin (nome, email, senha) 
        VALUES (:nome, :email, :senha)");
            $stmt->bindValue(":nome", $admin->getNome());
            $stmt->bindValue(":email", $admin->getEmail());
            $stmt->bindValue(":senha", $admin->getSenha());
            $stmt->execute();
            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao inserir administrador: ' . $e->getMessage();
        }
    }
    public function VerificaEmail($email)
    {
        try {
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
        } catch (PDOException $e) {
            echo 'Erro ao verificar e-mail: ' . $e->getMessage();
        }
    }
    public function selectAll()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM admin");
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Admin');
        } catch (PDOException $e) {
            echo 'Erro ao buscar administradores: ' . $e->getMessage();  
        }
    }
    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM admin WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir o registro: ' . $e->getMessage();
        }
    }
    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchObject('Admin');
        } catch (PDOException $e) {
            echo 'Erro ao buscar administradores: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function update(Admin $admin, $id)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE admin SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $admin->getNome());
            $stmt->bindParam(':email', $admin->getEmail());
            $stmt->bindParam(':senha', $admin->getSenha());
            $stmt->execute();
            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao atualizar administrador: ' . $e->getMessage();
        }
    }
}
