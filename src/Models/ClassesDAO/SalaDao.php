<?php
class SalaDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(Sala $sala)
    {
        $stmt = $this->pdo->prepare("INSERT INTO salas (nome, descricao, senha) VALUES (:nome, :descricao, :senha)");

        $stmt->bindValue(':nome', $sala->__get('nome'));
        $stmt->bindValue(':descricao', $sala->__get('descricao'));
        $stmt->bindValue(':senha', $sala->__get('senha'));


        $stmt->execute();

    }

    public function atualizar(Leitor $leitor)
    {
        
    }

    public function deletar($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM leitores WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }



    public function buscarPorId($id)
    {
        // $stmt = $this->pdo->prepare('SELECT * FROM leitores WHERE id = ?');
        // $stmt->bindValue(1, $id);
        // $stmt->execute();
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // return new Leitor($result['nome'], $result['username'], $result['email'], $result['contato'], $result['idade'], $result['senha']);
    }

    public function buscarTodos()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM salas");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
        }
    }

    public function buscarUsuario($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM leitores WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $leitor_obj = $stmt->fetchObject(); // Retorna um objeto em vez de um array
        return $leitor_obj;
    }
}
