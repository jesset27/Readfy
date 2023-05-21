<?php

require_once('./Classes/Leitor.php');

class LeitorDAO
{
    private $pdo;
    
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function inserir(Leitor $leitor)
    {
        $stmt = $this->pdo->prepare('INSERT INTO leitores (nome, username, email, contato, idade, senha, data) VALUES (?, ?, ?, ?, ?, ?, NOW())');
        
        $stmt->bindValue(1, $leitor->__get('nome'));
        $stmt->bindValue(2, $leitor->__get('userName'));
        $stmt->bindValue(3, $leitor->__get('email'));
        $stmt->bindValue(4, $leitor->__get('contato'));
        $stmt->bindValue(5, $leitor->__get('idade'));
        $stmt->bindValue(6, $leitor->__get('senha'));
        
        $stmt->execute();
    }

    public function LocalizarEmail(){
        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $email = $_POST['email'];
        //     $senha = $_POST['senha'];
    
        //     $stmt = $this->pdo->prepare('SELECT email, senha, tipo FROM leitores WHERE email = :email');
        //     $stmt->bindValue(':email', $email);
        //     $stmt->execute();
        //     $login = $stmt->fetch(PDO::FETCH_OBJ); 
            
        //     if ($login && password_verify($senha, $login->senha)){
        //         session_start();
        //         $_SESSION['email'] = $email;
        //         if ($login->tipo == 'user'){
        //             header("Location: homepage.php");
        //         }
        //         header("Location: homepageadmin.php");
        //     }else {
        //         echo 'Email ou senha incorretos';
        //     }
        // }
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
        // $stmt = $this->pdo->prepare('SELECT * FROM leitores');
        // $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $leitores = array();
        // foreach ($result as $row) {
        //     $leitor = new Leitor($row['nome'], $row['username'], $row['email'], $row['contato'], $row['idade'], $row['senha']);
        //     $leitor->__set('id', $row['id']);
        //     array_push($leitores, $leitor);
        // }
        // return $leitores;
    }
}
