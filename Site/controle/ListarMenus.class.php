<?php
include_once "modelo/LivroDAO.class.php";

class ListarMenus{
    function ListarMenus(){
        //acessando a camada modelo
        $dao = new LivroDAO();
        $lista = $dao->ListarMenus();
        
        //chamando a camada visao para exibir os dados
        include_once "visao/listaMenus.php";
    }
}