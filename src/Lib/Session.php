<?php  
class Session {
    public function __construct() {
        session_start();
    }

    public function defineValor($chave, $valor) {
        $_SESSION[$chave] = $valor;
    }

    public function obterValor($chave) {
        if (isset($_SESSION[$chave])) {
            return $_SESSION[$chave];
        }
        return null;
    }

    public function removerValor($chave) {
        unset($_SESSION[$chave]);
    }

    public function encerrar() {
        session_destroy();
    }
}
