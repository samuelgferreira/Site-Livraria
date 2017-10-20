<?php
session_start();
//inicia a sessão - coloca a sessão disponível para ser utilizada - fica apta a ser acessada pelo sistema (Sistema de Login, Carrinho de Compras, Sistema de Permissão/Acesso)

if($_POST["enviar"] == "Enviar"){
//Testando se o formulário da página anterior foi enviado
//Lá no formulário tem um botão com name="enviar" value="Enviar"
//enviar="Enviar"	

	$login = $_POST["login"];
	//pego a variável login do formulário
	//campo de entrada de texto com name="login"
	$senha = md5($_POST["senha"]);
	//variável senha
	//passo ela pela criptografia hash md5 que converte qualquer senha para 32 caracteres
	
	$conexao = @mysql_connect("localhost", "root", "");
//criando a variável de conexão ela recebe o retorno do método
//mysql_connect que tem como parâmetros: servidor (IP de localização do banco de dados), login do usuário e senha
//o @ na frente da função esconde mensagens de erro e alertas
//nesse caso esconde o alerta deprecated (função velha)
	
	mysql_select_db("trabalho", $conexao);
//função que seleciona o banco de dados trabalho que está dentro do gerenciado de banco de dados apontado pela $conexao
	
	$sql = "SELECT * FROM usuario WHERE 
	        login = '$login' AND senha = '$senha'";
//variável com string de uma consulta de banco de dados
//A SQL verificará se existe na tabela um usuário com o login e senha informados

	$usuario = mysql_query($sql) or die (mysql_error()); 
//A função mysql_query executa a SQL e o resultado da execução retorna uma matriz (ResultSet) cujas colunas são os campos da tabela e as linhas são os registros
//or die é acionado se ocorre um erro na função mysql_query, se ocorrer é impresso na tela o erro com mysql_error()
//$usuario conterá o ResultSet
	
	if(mysql_num_rows($usuario) == 1){
//Se o número de linhas do ResultSet for igual a 1, ou seja, foi encontrado um registro no banco com os dados informados então as linhas seguintes serão executadas
		$usuario = mysql_fetch_array($usuario);
//mysql_fetch_array percorre o ResultSet, a cada vez que ele é executado ele "aponta" para um registro. Quando é executado na primeira vez "aponta" para o primeiro registro, ou seja, a primeira linha
//a função transforma cada linha do ResultSet (matriz) em um array e coloca na variável $usuario
//neste ponto posso verificar, por exemplo, a permissão de um usuário, o nome dele, e outros dados.

		$nome = $usuario["nome"];
//$nome é uma informação do usuário gravada na tabela		
		
		$_SESSION["status"] = "Olá $nome, seu login foi efetuado com sucesso";
//Na sessão criei uma variável chamada status para que mensagens passem de uma página para outra

		$_SESSION["login"] = $login;
//gravei na sessão o login do usuário logado, assim conseguirei verificar em todas as páginas se o usuário foi autenticado

		header("location:index.php"); 
//redireciona o usuário para a página sistema.php 
		
	} else {
//caso não tenha encontrado o usuário na tabela
		$_SESSION["status"] = "Usuário ou senha errados";
//registra na variável status (responsável por passar mensagens de uma página para outra) que o usuário ou senha estão errados
		header("location:index.php"); 
//redireciona o usuário para a página index.php	
		
	}
}
?>

 