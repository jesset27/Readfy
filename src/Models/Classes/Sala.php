<?php
class Sala{
    private string $id;
    private string $codigo;
    private string $livros_id;
    private string $professor_id;
    private string $pagina_inicial;
    private string $pagina_final;
    private string $nome;
    private string $descricao;
    private string $prazo;
    public function __construct(){

        
    }
    private function generateUniqueCode() {
        return bin2hex(random_bytes(5));
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId(string $id){
        $this->id = $id;
    }
    public function getCodigo(): string {
        return $this->codigo;
    }

    public function setCodigo(): void {
        $this->codigo = $this->generateUniqueCode();
    }

    public function getLivrosId(): string {
        return $this->livros_id;
    }

    public function setLivrosId(string $livros_id): void {
        $this->livros_id = $livros_id;
    }

    public function getProfessorId(): string {
        return $this->professor_id;
    }

    public function setProfessorId(string $professor_id): void {
        $this->professor_id = $professor_id;
    }

    public function getPaginaInicial(): string {
        return $this->pagina_inicial;
    }

    public function setPaginaInicial(string $pagina_inicial): void {
        $this->pagina_inicial = $pagina_inicial;
    }

    public function getPaginaFinal(): string {
        return $this->pagina_final;
    }

    public function setPaginaFinal(string $pagina_final): void {
        $this->pagina_final = $pagina_final;
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getDescricao(): string{
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getPrazo(): string{
        return $this->prazo;
    }
    public function setPrazo($prazo){
        $this->prazo = $prazo;
    }
}