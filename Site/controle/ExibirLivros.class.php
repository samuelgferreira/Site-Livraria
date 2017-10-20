<?php
	include_once "modelo/LivroDAO.class.php";
	
	class ExibirLivros{
			function ExibirLivros(){
				$id = $_GET["id"];
				$dao = new LivroDAO();
				$usuario = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formExibirLivros.php";
			}
	}
?>