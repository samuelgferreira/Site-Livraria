<?php
	include_once "modelo/LivroDAO.class.php";
	
	class AlterarMenus{
		
		function AlterarMenus(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				
				$dao = new LivroDAO();
				
				$livro = new Livro();
				$livro->setId($_POST["id"]);
				$livro->setNome($_POST["nome"]);
				$dao->AlterarMenus($livro);
				
				$lista = $dao->ListarMenus();
				include_once "visao/listaMenus.php";
				
				
			}else{
				$id = $_GET["id"];
				$dao = new LivroDAO();
				$usuario = $dao->ExibirMenu($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarMenus.php";
			}
		}
	}
?>