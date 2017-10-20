<?php
//iniciei a sessão 

	if(isset($_SESSION["login"])){
//testei se a variável login existe dentro da sessão e se ela tem algum conteúdo, se tiver a página HTML a seguir (que está entre as chaves) será renderizado
//o HTML a seguir só será exibido se o usuário estiver logado
	} else {
	//se o usuario tentou acessar diretamente (pelo endereço admin.php) sem efetuar o login a variável de sessão não estará registrada, assim o acesso deverá ser dado como indevido
			$_SESSION["status"] = "Você tentou acessar de forma indevida uma página";
	//a variável de sessão status (que enviar mensagens entre as páginas - nossa definição) registra a ocorrência da tentativa indevida
			header("location:index.php");	
	//redireciona o usuário para o index.php
		}
include_once "controle/ListarLivros.class.php";
//ListarContatos() chama o construtor
$index = new ListarLivros();