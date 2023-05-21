<?php 
    class Leitor{
        private string $nome;
        private string $userName;
        private string $email;
        private int $contato;
        private int $idade;
        private string $senha;
        private string $tipo;
        public function __construct
        (
            string $nome,
            string $userName,
            string $email,
            int $contato,
            int $idade,
            string $senha,
            string $tipo
        )
        {
            $this->nome = $nome;
            $this->userName = $userName;
            $this->email = $email;
            $this->contato = $contato;
            $this->idade = $idade;
            $this->senha = $senha;
            $this->tipo = $tipo;
        }
        public function __get($nome)
        {
            return $this->$nome;
        }
        public function __set($atri, $value){
            $this->$atri = $value;
        }
    }
?>