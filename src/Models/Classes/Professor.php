<?php
class Professor{
    private string $id;
    private string $nome;
    private string $username;
    private string $email;
    private string $contato;
    private string $idade;
    private string $tipo;
    private string $senha;
    private string $data;

    public function __construct(){

    }
    public function getId(): string {
        return $this->id;
    }
    public function setId(string $id) {
        $this->id = $id;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    public function getUsername(): string {
        return $this->username;
    }
    public function setUsername(string $username) {
        $this->username = $username;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function getContato(): string {
        return $this->contato;
    }
    public function setContato(string $contato) {
        $this->contato = $contato;
    }
    public function getIdade(): string {
        return $this->idade;
    }
    public function setIdade(string $idade) {
        $this->idade = $idade;
    }
    public function getTipo(): string {
        return $this->tipo;
    }
    public function setTipo(string $tipo) {
        $this->tipo = $tipo;
    }
    public function getSenha(): string {
        return $this->senha;
    }
    public function setSenha(string $senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    public function getData(): string {
        return $this->data;
    }
    public function setData() {
        
    }
}