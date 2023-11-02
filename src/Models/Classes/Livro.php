<?php
class Livro
{
    private string $id;
    private string $nome;
    private string $editora;
    private string $autor;
    private string $datalancamento;
    private string $dataatual;
    private string $caminho;
    private string $genero;
    private string $total_paginas;
    private string $capa;
    public function __construct(
        $nome,
        $editora,
        $autor,
        $datalancamento,
        $caminho,
        $genero,
        $total_paginas,
        $capa
    ) {
        $this->nome = $nome;
        $this->editora = $editora;
        $this->autor = $autor;
        $this->datalancamento = $datalancamento;
        $this->caminho = $caminho;
        $this->genero = $genero;
        $this->total_paginas = $total_paginas;
        $this->capa = $capa;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getEditora(){
        return $this->editora;
    }
    public function setEditora($editora){
        $this->editora = $editora;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function getdatalancamento(){
        return $this->datalancamento;
    }
    public function setdatalancamento($datalancamento){
        $this->datalancamento = $datalancamento;
    }
    public function getDataatual(){
        return $this->dataatual;
    }
    public function setDataatual($dataatual){
        $this->dataatual = $dataatual;
    }
    public function getCaminho(){
        return $this->caminho;
    }
    public function setCaminho($caminho){
        $this->caminho = $caminho;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function setGenero($genero){
        $this->genero = $genero;
    }
    public function getTotalDePaginas(){
        return $this->total_paginas;
    }
    public function setTotalDePaginas($total_paginas){
        $this->total_paginas = $total_paginas;
    }
    public function getCapa(){
        return $this->capa;
    }
    public function setCapa($capa){
        $this->capa = $capa;
    }
}
