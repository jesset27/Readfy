<?php 
    class Livro{
        private $nome;
        private $editora;
        private $autor;
        private $datalancamento;
        private $caminho;
        private $genero;
        public function __construct(
            $nome,
            $editora,
            $autor,
            $datalancamento,
            $caminho,
            $genero
        ){
            $this->nome = $nome;
            $this->editora = $editora;
            $this->autor = $autor;
            $this->datalancamento = $datalancamento;
            $this->caminho = $caminho;
            $this->genero = $genero;
        }
        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
