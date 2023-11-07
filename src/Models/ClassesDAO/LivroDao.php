<?php
class LivroDao
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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
            move_uploaded_file($_FILES['livro']['tmp_name'], $livroNome);
            move_uploaded_file($_FILES['livro']['tmp_name'], $capaLivroNome);
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
}
