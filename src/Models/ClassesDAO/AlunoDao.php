<?php
class AlunoDao {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o modo de erro para exceções
    }

    public function insert(Aluno $aluno)
    {
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
            $stmt = $this->pdo->prepare("SELECT * FROM aluno");
            $stmt->execute();
             $this->pdo = null;
            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Aluno');
        } catch (PDOException $e) {
            echo 'Erro ao buscar alunos: ' . $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM aluno WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir o registro: ' . $e->getMessage();
        }
    }
    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM aluno WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchObject('Aluno');
        } catch (PDOException $e) {
            echo 'Erro ao buscar alunos: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function update(Aluno $aluno, $id)
    {
        try {
            $nome = $aluno->getNome();
            $username = $aluno->getUsername();
            $email = $aluno->getEmail();
            $contato = $aluno->getContato();
            $idade = $aluno->getIdade();
            $senha = $aluno->getSenha();

            $stmt = $this->pdo->prepare(
                "UPDATE aluno SET
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
            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao atualizar aluno: ' . $e->getMessage();
        }
    }
}
