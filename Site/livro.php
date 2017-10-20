<?php
session_start();

if(isset($_GET["func"])){
    $funcao = $_GET["func"];
	if($funcao == "livro"){
        include_once "controle/ExibirLivros.class.php";
        $controle = new ExibirLivros();
    }
	else if($funcao == "inicio"){
        include_once "controle/inicio.php";
    }
	else if($funcao == "up"){
        include_once "model/LivroDAO.class.php";
		$index = new Up($_GET["id"]);
    }
	else if($funcao == "down"){
        include_once "model/LivroDAO.class.php";
		$index = new Down($_GET["id"]);
    }
	else if($funcao == "menus"){
        include_once "controle/ListarMenus.class.php";
		$index = new ListarMenus();
    }
	else if($funcao == "cadmenu"){
        include_once "controle/AdicionarMenus.class.php";
        $controle = new AdicionarMenus();
    }
	else if($funcao == "logout"){
        include_once "controle/logout.php";
    }
	else if($funcao == "login"){
        include_once "controle/login.php";
    }
    else if($funcao == "cadastrar"){
        include_once "controle/AdicionarLivros.class.php";
        $controle = new AdicionarLivros();
    }elseif($funcao == "alterar"){
        include_once "controle/AlterarLivros.class.php";
        $controle = new AlterarLivros();
    }elseif($funcao == "alterarmenu"){
        include_once "controle/AlterarMenus.class.php";
        $controle = new AlterarMenus();
    }elseif($funcao == "exibir"){
        include_once "controle/ExibirLivro.class.php";
        $controle = new ExibirLivro();
    }elseif($funcao == "excluir"){
        include_once "controle/ExcluirLivros.class.php";
        $controle = new ExcluirLivros();
    }
	elseif($funcao == "excluirmenu"){
        include_once "controle/ExcluirMenus.class.php";
        $controle = new ExcluirMenus();
    }else{
        include_once "controle/ListarLivros.class.php";
        //ListarLivros() chama o construtor
        $controle = new ListarLivros();;
    }
}