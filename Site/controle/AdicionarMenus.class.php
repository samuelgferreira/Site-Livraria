<?php
	include_once "modelo/LivroDAO.class.php";
	
	class AdicionarMenus{
		
		function AdicionarMenus(){
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				
				$dao = new LivroDAO();
				
				$livro = new Livro();
				$livro->setNome($_POST["nome"]);
				$dao->InserirMenu($livro);
				
				
				$lista = $dao->ListarMenus();
				include_once "visao/listaMenus.php";
				
				
			}else{
				include_once "visao/formAdicionaMenu.php";
			}
		}
	}
?>