<?php
class LivroDao
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert(Livro $livro)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO livros (
            nome,
            editora,
            autor,
            datalancamento,
            caminho,
            genero,
            total_paginas,
            capa
        ) VALUES (
            :nome, 
            :editora, 
            :autor,
            :datalancamento,
            :caminho,
            :genero,
            :total_paginas,
            :capa
        )");

            $stmt->bindValue(':nome', $livro->getNome());
            $stmt->bindValue(':editora', $livro->getEditora());
            $stmt->bindValue(":autor", $livro->getAutor());
            $stmt->bindValue(':datalancamento', $livro->getdatalancamento());
            $stmt->bindValue(':caminho', $livro->getCaminho());
            $stmt->bindValue(":genero", $livro->getGenero());
            $stmt->bindValue(':total_paginas', $livro->getTotalDePaginas());
            $stmt->bindValue(':capa', $livro->getCapa());

            $stmt->execute();

            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao inserir livro: ' . $e->getMessage();
        }
    }
    public function UploadFiles($livroNome, $capaLivroNome)
    {
        try {
            move_uploaded_file($_FILES['livro']['tmp_name'], '../../public/pdf/' . $livroNome);
            move_uploaded_file($_FILES['capaLivro']['tmp_name'], '../../public/img/capas/' . $capaLivroNome);
            return true;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            return false;
        }
    }

    public function selectAll()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM livros");
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Livro');
        } catch (PDOException $e) {
            echo 'Erro ao buscar livros : ' . $e->getMessage();
        }
    }

   
    public function getLivrosPorGenero($genero) {
        
        try {
                $stmt = $this->pdo->prepare("SELECT * FROM livros WHERE genero = :genero");
                $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Livro');
            } catch (PDOException $e) {
                echo 'Erro ao buscar livros por gênero: ' . $e->getMessage();
                return []; // Retorna um array vazio em caso de erro
            }
    }
    
     
 

    public function selectById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM livros WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $this->pdo = null;
            return $stmt->fetchObject('Livro');
        } catch (PDOException $e) {
            echo 'Erro ao buscar: ' . $e->getMessage();
        }
        $stmt->execute();
    }

    public function getGenerosOrdenados() {
        try {
            $stmt = $this->pdo->prepare("SELECT DISTINCT genero FROM livros ORDER BY genero ASC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (PDOException $e) {
            echo 'Erro ao buscar gêneros: ' . $e->getMessage();
        }
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

    public function update(Livro $livro, $id)
    {
        try {
            $nome = $livro->getNome();
            $editora = $livro->getEditora();
            $autor = $livro->getAutor();
            $datalancamento = $livro->getdatalancamento();
            $caminho = $livro->getCaminho();
            $genero = $livro->getGenero();
            $totaldepaginas = $livro->getTotalDePaginas();
            $capa = $livro->getCapa();


            $stmt = $this->pdo->prepare(
                "UPDATE livros SET
                nome = :nome,
                editora = :editora,
                autor = :autor,
                datalancamento = :datalancamento,
                caminho = :caminho,
                genero = :genero,
                totaldepaginas = :totaldepaginas,
                capa = :capa
            WHERE id = :id"
            );

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':editora', $editora);
            $stmt->bindParam(':autor', $autor);
            $stmt->bindParam(':datalancamento', $datalancamento);
            $stmt->bindParam(':caminho', $caminho);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':totaldepaginas', $totaldepaginas);
            $stmt->bindParam(':capa', $capa);
            $stmt->execute();
            $this->pdo = null;
        } catch (PDOException $e) {
            echo 'Erro ao atualizar professor: ' . $e->getMessage();
        }
    }
    public function selectByIdSalaLivro($id)
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT
            livros.id AS livro_id,
            livros.nome AS nome_livro,
            livros.editora,
            livros.autor,
            livros.datalancamento,
            livros.genero,
            livros.total_paginas,
            livros.capa,
            sala.prazo
        FROM
            sala
        JOIN livros ON sala.livros_id = livros.id
        WHERE
            sala.id = :sala_id;
            ");
            $stmt->bindParam(':sala_id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro : ' . $e->getMessage();
        }
    }
}
