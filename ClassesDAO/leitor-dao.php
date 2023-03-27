<?php 
    class LeitorDAO{
        public function load(){}
        public function insert($nome, $usuario, $email, $contato, $idade){
            $sql = "INSERT INTO leitores (id, nome, usuario, email, contato, idade) 
            VALUES (NULL, $nome, $usuario, $email, $contato, $idade)";
        } 
        public function update(){}
        public function list(){}
        public function delete(){}
    }
?>