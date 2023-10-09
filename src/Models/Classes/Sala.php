<?php 
    class Sala{
        private $nome;
        private $descricao;
        private $senha;
        public function __construct(
            $nome,
            $descricao,
            $senha
        ){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->senha = $senha;

        }
        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
