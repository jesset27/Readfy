<?php
class GeneroDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(Genero $genero)
    {
        $stmt = $this->pdo->prepare("INSERT INTO generos (nome) VALUES (:nome)");

        $stmt->bindValue(':nome', $genero->__get('nome'));

        $stmt->execute();
    }

    public function bucarGeneros(){
        $stmt = $this->pdo->prepare("SELECT * FROM generos");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
