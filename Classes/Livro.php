<?php 
    class Livro{
        private $nome;
        private $editora;
        private $autor;
        private $dataLancamento;
        private $dataAtual;
        public function __construct(
            $nome,
            $editora,
            $autor,
            $dataLancamento,
            $dataAtual
        ){
            $this->nome = $nome;
            $this->editora = $editora;
            $this->autor = $autor;
            $this->dataLancamento = $dataLancamento;
            $this->dataAtual = $dataAtual;
        }
        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
?>