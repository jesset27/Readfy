<?php
class LivroDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(Livro $livro)
    {

        $stmt = $this->pdo->prepare("INSERT INTO livros 
        (nome, editora, autor, datalancamento, dataatual, caminho, genero) 
        VALUES (:nome, :editora, :autor, :datalancamento, NOW(), :caminho, :genero)");

        $stmt->bindValue(':nome', $livro->__get('nome'));
        $stmt->bindValue(':editora', $livro->__get('editora'));
        $stmt->bindValue(':autor', $livro->__get('autor'));
        $stmt->bindValue(':datalancamento', $livro->__get('datalancamento'));
        $stmt->bindValue(':caminho', $livro->__get('caminho'));
        $stmt->bindValue(':genero', $livro->__get('genero'));
        $stmt->execute();
    }



    





    public function atualizar(Leitor $leitor)
    {
        $stmt = $this->pdo->prepare('UPDATE leitores SET nome = ?, username = ?, email = ?, contato = ?, idade = ?, senha = ? WHERE id = ?');

        $stmt->bindValue(1, $leitor->__get('nome'));
        $stmt->bindValue(2, $leitor->__get('userName'));
        $stmt->bindValue(3, $leitor->__get('email'));
        $stmt->bindValue(4, $leitor->__get('contato'));
        $stmt->bindValue(5, $leitor->__get('idade'));
        $stmt->bindValue(6, $leitor->__get('senha'));
        $stmt->bindValue(7, $leitor->__get('id'));

        $stmt->execute();
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
            $stmt = $this->pdo->prepare("SELECT * FROM livros");
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
