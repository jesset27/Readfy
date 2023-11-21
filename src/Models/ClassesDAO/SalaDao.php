<?php
class SalaDao
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function inserir(Sala $sala)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO sala (
                codigo,
                livros_id,
                professor_id,
                pagina_inicial,
                pagina_final,
                nome,
                descricao,
                prazo
            ) VALUES (
                :codigo,
                :livros_id,
                :professor_id,
                :pagina_inicial,
                :pagina_final,
                :nome,
                :descricao,
                :prazo
            )");
            $stmt->bindValue(':codigo', $sala->getCodigo());
            $stmt->bindValue(':livros_id', $sala->getLivrosId());
            $stmt->bindValue(':professor_id', $sala->getProfessorId());
            $stmt->bindValue(':pagina_inicial', $sala->getPaginaInicial());
            $stmt->bindValue(':pagina_final', $sala->getPaginaFinal());
            $stmt->bindValue(':nome', $sala->getNome());
            $stmt->bindValue(':descricao', $sala->getDescricao());
            $stmt->bindValue(':prazo', $sala->getPrazo());
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao inserir professor: ' . $e->getMessage();
        }
    }
    public function selectAll()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM sala WHERE professor_id = :professor_id");
            $stmt->bindParam(':professor_id', $_SESSION['professor']);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Sala');
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM sala WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao excluir o registro: ' . $e->getMessage();
        }
    }
    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM sala WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchObject('Sala');
        } catch (PDOException $e) {
            echo 'Erro ao buscar salas: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function update(Sala $sala, $id)
    {
        $codigo = $sala->getCodigo();
        $livrosId = $sala->getLivrosId();
        $professorId = $sala->getProfessorId();
        $paginaInicial = $sala->getPaginaInicial();
        $paginaFinal = $sala->getPaginaFinal();
        $nome = $sala->getNome();
        $descricao = $sala->getDescricao();
        $prazo = $sala->getPrazo();
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE sala SET
            codigo = :codigo,
            livros_id = :livros_id,
            professor_id = :professor_id,
            pagina_inicial = :pagina_inicial,
            pagina_final = :pagina_final,
            nome = :nome,
            descricao = :descricao,
            prazo = :prazo
            WHERE id = :id"
            );

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':livros_id', $livrosId);
            $stmt->bindParam(':professor_id', $professorId);
            $stmt->bindParam(':pagina_inicial', $paginaInicial);
            $stmt->bindParam(':pagina_final', $paginaFinal);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':prazo', $prazo);


            $stmt->execute();
            $this->pdo = null;
            header('Location: ../index.php');
        } catch (PDOException $e) {
            echo 'Erro ao atualizar sala: ' . $e->getMessage();
        }
    }
}
