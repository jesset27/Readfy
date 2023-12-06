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
    public function selectAllByIdProfessor()
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
            return $stmt->fetchObject('Sala');
        } catch (PDOException $e) {
            echo 'Erro ao buscar salas: ' . $e->getMessage();
        }
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
            header('Location: ../index.php');
        } catch (PDOException $e) {
            echo 'Erro ao atualizar sala: ' . $e->getMessage();
        }
    }
    public function buscarSala($codigo)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM sala WHERE codigo = :codigo');
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            return $stmt->fetchObject('Sala');
        } catch (PDOException $e) {
            echo 'Erro ao buscar sala: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function entrarSala($aluno_id, $sala_id)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO alunosala (
                aluno_id,
                sala_id
            ) VALUES (:aluno_id, :sala_id)');
            $stmt->bindParam(':aluno_id', $aluno_id);
            $stmt->bindParam(':sala_id', $sala_id);
            $stmt->execute();
            return $stmt->fetchObject('Sala');
        } catch (PDOException $e) {
            echo 'Erro ao entrar na sala: ' . $e->getMessage();
        }
        $stmt->execute();
    }
    public function mostrarSalasLogadas($aluno_id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM aluno');
            $stmt->bindParam(':aluno_id', $aluno_id);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            echo 'Erro ao buscar salas: ' . $e->getMessage();
        }
    }
    public function selectAlunoSala()
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT
        sala.id AS sala_id,
        livros.nome AS nome_livros,
        professor.nome AS nome_professor
    FROM
        alunosala
    JOIN sala ON alunosala.sala_id = sala.id
    JOIN livros ON sala.livros_id = livros.id
    JOIN professor ON sala.professor_id = professor.id
    WHERE
        alunosala.aluno_id = :aluno_id
            ");
            $stmt->bindParam(':aluno_id', $_SESSION['aluno']);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    public function mostrarAlunoSala($salaId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT
            aluno.nome AS nome_aluno,
            sala.id AS id_sala,
            aluno.id AS id_aluno,
            COALESCE(SUM(leitura.porcentagem) / (sala.pagina_final - sala.pagina_inicial + 1), 0) AS soma_porcentagem
        FROM
            alunosala
        JOIN aluno ON alunosala.aluno_id = aluno.id
        LEFT JOIN leitura ON aluno.id = leitura.aluno_id AND alunosala.sala_id = leitura.sala_id
        JOIN sala ON alunosala.sala_id = sala.id
        WHERE
            alunosala.sala_id = :salaId
        GROUP BY
            aluno.id;
    ");

            $stmt->bindParam(':salaId', $salaId, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function excluirAlunoSala($idSala, $idAluno){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM alunosala WHERE sala_id = :sala_id AND aluno_id = :aluno_id");
                $stmt->bindParam(':sala_id', $idSala, PDO::PARAM_INT);
            $stmt->bindParam(':aluno_id', $idAluno, PDO::PARAM_INT);
                $stmt->execute();
    
            header('Location: ./index.php');
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    
    public function __destruct()
    {
        $this->pdo = null;
    }
}
