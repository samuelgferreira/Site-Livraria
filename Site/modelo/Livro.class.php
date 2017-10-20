<?php
class livro{
    private $id;
    private $nome;
    private $autor;
	private $arquivo;
	private $categoria;
	private $descricao;
	
    //construtor
    public function Livro(){
    }
    //setters e getters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function getAutor(){
        return $this->autor;
    }
	
	public function setArquivo($arquivo){
        $this->arquivo = $arquivo;
    }
    public function getArquivo(){
        return $this->arquivo;
    }
	
	public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function getCategoria(){
        return $this->categoria;
    }
	
	public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
}