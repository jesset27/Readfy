<?php
class LeitorDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function inserir(Leitor $leitor)
    {
        $senhaCriptografada = password_hash($leitor->senha, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO leitores (nome, username, email, contato, idade, senha, data, tipo) VALUES (:nome, :username, :email, :contato, :idade, :senha, NOW(), 'user')");

        $stmt->bindValue(':nome', $leitor->__get('nome'));
        $stmt->bindValue(':username', $leitor->__get('userName'));
        $stmt->bindValue(':email', $leitor->__get('email'));
        $stmt->bindValue(':contato', $leitor->__get('contato'));
        $stmt->bindValue(':idade', $leitor->__get('idade'));
        $stmt->bindValue(':senha', $senhaCriptografada);

        $stmt->execute();
    }



    public function Login($email, $senha)
    {
        $stmt = $this->pdo->prepare('SELECT email, senha, tipo FROM leitores WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $login = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($login && password_verify($senha, $login['senha'])) {
            if ($login['tipo'] == 'user') {
                Session::defineValor('tipo', 'user',  'email', $email);
                header("Location: ./usuario/index.php");
            } else if ($login['tipo'] == 'admin') {
                Session::defineValor('tipo', 'user',  'email', $email);
                header("Location: ./administrativo/index.php");
            } else if ($login['tipo'] == 'professor'){
                Session::defineValor('tipo', 'user',  'email', $email);
                header("Location: ./professor/index.php");
            }
        } else {
            echo "senha incorreta";
        }
    }



    public function VerificaEmail($email)
    {

        $stmt = $this->pdo->prepare('SELECT * FROM leitores WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $leitor_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$leitor_data) {
            // email não existe, cadastre    
            return true;
        } else {
            //email ja existe, não cadastre
            return false;
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

    public function atualizar($id, $nome, $username, $email, $contato, $idade)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE leitores SET nome = ?, username = ?, email = ?, contato = ?, idade = ? 
                WHERE id = $id
                "
        );

        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $username);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $contato);
        $stmt->bindValue(5, $idade);
        $stmt->execute();
        header("Location: ./leitores.php");
    }

    public function deletar($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM leitores WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }



    public function buscarPorId($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM leitores WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function buscarTodos()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM leitores");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
        }
    }
}
