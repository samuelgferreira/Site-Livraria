<?php
	include_once "modelo/LivroDAO.class.php";
	
	class AlterarLivros{
		
		function AlterarLivros(){
				if(isset($_FILES['arquivo']))
			   {
				  date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
			 
				  $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
				  $new_name = date("Y-m-d-H-i-s") . $ext; //Definindo um novo nome para o arquivo
				  $dir = '/wamp64/www/Site/fotos/'; //Diretório para uploads
			 
				  move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			   }
			if(isset($_POST["enviar"])){//Quando aparecer o POST significa que esta acontecendo um envio
				$dao = new LivroDAO();
				
				$livro = new Livro();
				$livro->setId($_POST["id"]);
				$livro->setNome($_POST["nome"]);
				$livro->setAutor($_POST["autor"]);
				$livro->setCategoria($_POST["categoria"]);
				$livro->setDescricao($_POST["descricao"]);
				$livro->setArquivo($new_name);
				$dao->alterar($livro);
				
				$lista = $dao->listar();
				include_once "visao/listaLivros.php";
				
				
			}else{
				$id = $_GET["id"];
				$dao = new LivroDAO();
				$usuario = $dao->exibir($id);
				//echo $_GET["id"];
				
				//echo $usuario->getNome();
				include_once "visao/formAlterarLivro.php";
			}
		}
	}
?>