<?php
class Admin{
    private string $id;
    private string $nome;
    private string $email;
    private string $senha;
    public function __construct($nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    public function getId(){
        return $this->id;
    }
    public function setId(string $id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getsenha(){
        return $this->senha;
    }
    public function setSenha(string $senha){
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
}