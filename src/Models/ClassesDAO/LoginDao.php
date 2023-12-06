<?php
class LoginDao
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($email, $senha)
    {
        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                'aluno' AS tipo,
                a.id AS id,
                a.email AS email,
                a.senha AS senha
                FROM aluno AS a
                WHERE a.email = :email

                UNION ALL

                SELECT
                'professor' AS tipo,
                p.id AS id,
                p.email AS email,
                p.senha AS senha
                FROM professor AS p
                WHERE p.email = :email

                UNION ALL

                SELECT
                'admin' AS tipo,
                admin.id AS id,
                admin.email AS email,
                admin.senha AS senha
                FROM admin AS admin
                WHERE admin.email = :email
            ");

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);



            if ($result) {
                $tipo_usuario = $result['tipo'];
                $senha_hash = $result['senha'];
                if (password_verify($senha, $senha_hash)) {
                    if ($tipo_usuario === 'admin') {
                        $session = new Session();
                        $session->definir('administrador', $result['id']);
                        header('Location: /readfy/administrativo/administradores');
                    } elseif ($tipo_usuario === 'professor') {
                        $session = new Session();
                        $session->definir($result['tipo'], $result['id']);
                        header('Location: /readfy/professor/');
                    } else {
                        $session = new Session();
                        $session->definir($result['tipo'], $result['id']);
                        header('Location: /readfy/aluno/');
                    }
                } else {
                    echo "Senha incorreta";
                }
            } else {
                echo "Email não encontrado";
            }
            $this->pdo = null;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Erro na consulta: " . $e->getMessage());
        }
    }
}
