<?php
class ProfessorDao
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert(Professor $professor)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO professor (
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

            $stmt->bindValue(':nome', $professor->getNome());
            $stmt->bindValue(':username', $professor->getUsername());
            $stmt->bindValue(':email', $professor->getEmail());
            $stmt->bindValue(':contato', $professor->getContato());
            $stmt->bindValue(':idade', $professor->getIdade());
            $stmt->bindValue(':tipo', $professor->getTipo());
            $stmt->bindValue(":senha", $professor->getSenha());


            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao inserir professor: ' . $e->getMessage();
        }
    }
    public function VerificaEmail($email)
    {
        try {
            $stmt = $this->pdo->prepare("
                SELECT
                'aluno' AS tipo,
                a.id AS id,
                a.email AS email,
                a.senha AS senha
                FROM aluno AS a
                WHERE a.email = :email

                UNION ALL

                SELECT
                'professor' AS tipo,
                p.id AS id,
                p.email AS email,
                p.senha AS senha
                FROM professor AS p
                WHERE p.email = :email

                UNION ALL

                SELECT
                'admin' AS tipo,
                admin.id AS id,
                admin.email AS email,
                admin.senha AS senha
                FROM admin AS admin
                WHERE admin.email = :email
            ");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $leitor_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$leitor_data) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erro ao verificar e-mail: ' . $e->getMessage();
        }
    }
    public function selectAll()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM professor");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Professor');
        } catch (PDOException $e) {
            echo 'Erro ao buscar professores: ' . $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM professor WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir o registro: ' . $e->getMessage();
        }
    }
    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM professor WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchObject('Professor');
        } catch (PDOException $e) {
            echo 'Erro ao buscar professores: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function update(Professor $professor, $id)
    {
        try {
            $nome = $professor->getNome();
            $username = $professor->getUsername();
            $email = $professor->getEmail();
            $contato = $professor->getContato();
            $idade = $professor->getIdade();
            $senha = $professor->getSenha();

            $stmt = $this->pdo->prepare(
                "UPDATE professor SET
            nome = :nome,
            username = :username,
            email = :email,
            contato = :contato,
            idade = :idade,
            senha = :senha
            WHERE id = :id"
            );

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contato', $contato);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao atualizar professor: ' . $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
