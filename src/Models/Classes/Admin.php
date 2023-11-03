<?php
class Admin{
    private string $id;
    private string $name;
    private string $email;
    private string $password;
    public function __construct(){

        
    }
    public function getId(){
        return $this->id;
    }
    public function setId(string $id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword(string $password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}