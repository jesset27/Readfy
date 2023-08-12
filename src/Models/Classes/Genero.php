<?php 
    class Genero{
        private $nome;
        public function __construct(
            $nome
        ){
            $this->nome = $nome;
        }
        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
