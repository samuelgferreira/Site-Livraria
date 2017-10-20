<?php
include_once "modelo/LivroDAO.class.php";

class ListarLivros{
    function ListarLivros(){
        //acessando a camada modelo
        $dao = new LivroDAO();
        $lista = $dao->Listar();
        
        //chamando a camada visao para exibir os dados
        include_once "visao/listaLivros.php";
    }
}