<?php
class LivroDao{
    private $pdo;
    public function __construct($pdo){
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
            dataatual,
            caminho,
            genero,
            total_paginas,
            capa
        ) VALUES (
            :nome, 
            :editora, 
            :autor,
            :datalancamento,
            :dataatual,
            :caminho,
            :genero,
            :total_paginas,
            :capa
        )");

        $stmt->bindValue(':nome', $livro->getNome());
        $stmt->bindValue(':editora', $livro->getEditora());
        $stmt->bindValue(":autor", $livro->getAutor());
        $stmt->bindValue(':datalancamento', $livro->getdatalancamento());
        $stmt->bindValue(':dataatual', $livro->getDataatual());
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

}