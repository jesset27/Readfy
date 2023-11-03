<?php

require_once('../src/Models/Classes/Livro.php');
class LivroDao
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(Livro $livro)
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
            $uploadDir = '../public/pdf/';
            $uploadDirCapa = '../public/img/capas/';

            $livroNome = $_FILES['livro']['name'];
            $capaLivroNome = $_FILES['capaLivro']['name'];

            $livroPath = $uploadDir . $livroNome;
            $capaLivroPath = $uploadDirCapa . $capaLivroNome;

            move_uploaded_file($_FILES['livro']['tmp_name'], $livroPath);
            move_uploaded_file($_FILES['capaLivro']['tmp_name'], $capaLivroPath);
            header('Location: ./galeria.php');
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    public function Select()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM livros");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'Erro ao buscar livros: ' . $e->getMessage();
        }
    }
}
