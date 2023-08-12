<?php  
class Session {
    public static function defineValor($chave, $valor, $email, $user) {
        session_start();
        $_SESSION[$chave] = $valor;
        $_SESSION[$email] = $user;
    }

    public static function obterValor($chave) {
        session_start();
        if (isset($_SESSION[$chave])) {
            return array ($_SESSION[$chave], $_SESSION['email']);
        }
        header('Location: /readfy');
    }

    public static function removerValor($chave) {
        session_start();
        unset($_SESSION[$chave]);
    }

    public static function encerrar() {
        session_start();
        session_destroy();
    }
}
