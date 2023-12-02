<?php
class LeituraDao
{    
    /**
     * pdo
     *
     * @var mixed
     */
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    
    /**
     * insert
     *
     * @param  mixed $livro
     * @return void
     */
    public function insert(int $pg_id, int $s_id, int $l_id, int $a_id)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO leitura (
            pagina_atual,
            sala_id,
            livros_id,
            aluno_id,
            porcentagem
        ) VALUES (
            :pg_id,
            :s_id,
            :l_id,
            :a_id,
            0
        )");

            $stmt->bindValue(':pg_id', $pg_id);
            $stmt->bindValue(':s_id', $s_id);
            $stmt->bindValue(":l_id", $l_id);
            $stmt->bindValue(':a_id', $a_id);
            $stmt->execute();


        } catch (PDOException $e) {
            echo 'Erro ao inserir Registro -> Leitura: ' . $e->getMessage();
        }
    }
    public function selectAll()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM leitura");
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Livro');
        } catch (PDOException $e) {
            echo 'Erro ao buscar livros : ' . $e->getMessage();
        }
    }
    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM leitura WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject('Livro');
        } catch (PDOException $e) {
            echo 'Erro ao buscar alunos: ' . $e->getMessage();
        }
        $stmt->execute();
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM livros WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir o registro: ' . $e->getMessage();
        }
    }

    public function update(int $pg_id, int $s_id, int $l_id, int $a_id, $porcentagem)
    {
        try {
           
            $stmt = $this->pdo->prepare(
            "UPDATE leitura SET porcentagem = :porcentagem
             WHERE 
                 pagina_atual = :pagina_atual AND
             sala_id = :sala_id AND
             livros_id = :livro_id AND
             aluno_id = :aluno_id
            ");

            $stmt->bindParam(':pagina_atual', $pg_id, \PDO::PARAM_INT);
            $stmt->bindParam(':sala_id', $s_id, \PDO::PARAM_INT);
            $stmt->bindParam(':livro_id', $l_id, \PDO::PARAM_INT);
            $stmt->bindParam(':aluno_id', $a_id, \PDO::PARAM_INT);
            $stmt->bindParam(':porcentagem', $porcentagem, \PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Erro ao atualizar leitura: ' . $e->getMessage();
        }
    }
    
    /**
     * Método para pegar a pagina especifica
     *
     * @param  mixed $IdSala
     * @param  mixed $idAluno
     * @param  mixed $livroId
     * @param  mixed $page
     * @return object
     */
    public function getSpecifPage(int $IdSala, int $idAluno, int $livroId, int $page ){
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM leitura WHERE
            pagina_atual = :pagina_atual AND
            sala_id = :sala_id AND
            livros_id = :livro_atual AND
            aluno_id = :aluno_id
            ');
            $stmt->bindParam(':pagina_atual', $page, \PDO::PARAM_INT);
            $stmt->bindParam(':sala_id', $IdSala, \PDO::PARAM_INT);
            $stmt->bindParam(':livro_atual', $livroId, \PDO::PARAM_INT);
            $stmt->bindParam(':aluno_id', $idAluno, \PDO::PARAM_INT);
            $stmt->execute();

            if ( $stmt->rowCount() >0 ){
                return $stmt->fetchObject();
            }
            return null;
        } catch (PDOException $e) {
            echo 'Erro ao buscar : ' . $e->getMessage();
        }
        $stmt->execute();
    }

    public function __destruct(){
        $this->pdo = null;
    }
}
