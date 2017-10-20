<?php
	include_once "modelo/LivroDAO.class.php";
	class ExcluirLivros{
		
	
		function ExcluirLivros(){
				//$id = $_GET["id"];
				$dao = new LivroDAO();
				$id=$_GET["id"];
				$dao->excluir($id);
				$lista = $dao->listar();
				
				include_once "visao/listaLivros.php";
			
		}
	}
?>