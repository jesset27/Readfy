<?php
class Session
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            @session_start();
        }
    }

    public function definir($chave, $valor)
    {
        $_SESSION[$chave] = $valor;
    }

    public function obter($chave)
    {
        return isset($_SESSION[$chave]) ? $_SESSION[$chave] : null;
    }

    public function existe($chave)
    {
        return isset($_SESSION[$chave]);
    }

    public function remover($chave)
    {
        if ($this->existe($chave)) {
            unset($_SESSION[$chave]);
        }
    }

    public function destruir()
    {
        session_destroy();
    }
}
?>
