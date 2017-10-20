<?php
	include_once "modelo/LivroDAO.class.php";
	class ExcluirMenus{
		
	
		function ExcluirMenus(){
				//$id = $_GET["id"];
				$dao = new LivroDAO();
				$id=$_GET["id"];
				$dao->excluirmenu($id);
				$lista = $dao->ListarMenus();
				
				include_once "visao/listaMenus.php";
			
		}
	}
?>