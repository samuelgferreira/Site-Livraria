<?php

	if(isset($_SESSION["login"])){
//testei se a variável login existe dentro da sessão e se ela tem algum conteúdo, se tiver a página HTML a seguir (que está entre as chaves) será renderizado
//o HTML a seguir só será exibido se o usuário estiver logado
?>
<html>
<head>
	<script language="JavaScript" type="text/javascript">
		function checkDelete(){
			return confirm('Are you sure?');
		}
	</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Livraria</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>
    <div class="brand">Livraria</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="livro.php?func=cadastrar">Cadastrar</a>
                    </li>
					<li>
						<a href="livro.php?func=inicio">Administrar</a>
					</li>	
					<li>
						<a href="livro.php?func=logout">Logout</a>
                    </li>					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<form action="livro.php?func=alterarmenu" method = "post"">
              <?php
                foreach ($usuario as $reg)
				{
						echo "<input type='hidden' name='id' value='".$reg->getId()."'>";						
						echo "<p>Nome:</p> <input type='text' name='nome' value='".$reg->getNome()."'><br/>";
				}
               ?>
			   <br>
			   			<input type="submit" name="enviar" value="Enviar">
				<br>
				<br>	
				<br>
				<br>	
				<br>
				<br>	
				<br>
				<br>	
				<br>
				<br>	
				<br>
				<br>		
				<br>	
				<br>
				<br>		
				<br>
				<br>		
				<br>					
		</form>
	</div>
    <!-- /.container -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Vitor Mendes</h4>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php		
	} else {
//se o usuario tentou acessar diretamente (pelo endereço admin.php) sem efetuar o login a variável de sessão não estará registrada, assim o acesso deverá ser dado como indevido
		$_SESSION["status"] = "Você tentou acessar de forma indevida uma página";
//a variável de sessão status (que enviar mensagens entre as páginas - nossa definição) registra a ocorrência da tentativa indevida
		header("location:index.php");	
//redireciona o usuário para o index.php
	}
?>