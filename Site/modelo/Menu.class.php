<?php
class menu{
    private $id;
    private $nome;
	
    //construtor
    public function Menu(){
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
}