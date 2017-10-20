<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Livraria</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/index.css" rel="stylesheet">

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
	<?php
			session_start();
	//iniciei a sessão 
	?>
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
							<?php
								include_once "modelo/LivroDAO.class.php";
								  //acessando a camada modelo
								$dao = new LivroDAO();
								$lista = $dao->ListarMenus();
								foreach ($lista as $reg){	
									echo "<li><a href='index.php?c=".$reg->getNome()."'>".$reg->getNome()."</a></li>";	
								}
							?>
							<?php if(isset($_SESSION["login"])){
						//testei se a variável login existe dentro da sessão e se ela tem algum conteúdo, se tiver a página HTML a seguir (que está entre as chaves) será renderizado
						//o HTML a seguir só será exibido se o usuário estiver logado
								echo '<li><a href="livro.php?func=inicio">Administrar</a></li>';
								echo"<li><a href='livro.php?func=logout'>Logout</a></li>";
								}
						else
						{
							echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>';
						}
						?>
                    
                </ul>
            </div>
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login</h1><br>
				  <form action="livro.php?func=login" method="post">
					<input type="text" name="login" placeholder="usuario">
					<input type="password" name="senha" placeholder="senha">
					<input type="submit" name="enviar" class="login loginmodal-submit" value="Enviar">
				  </form>
				</div>
			</div>
		</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
		<?php
			include_once "modelo/LivroDAO.class.php";
			if(isset($_GET["c"])){
				$funcao = $_GET["c"];
				$dao = new LivroDAO();
				$funcao="select * from livros where categoria='".$funcao."'";
				$lista = $dao->ListarCategoria($funcao);
			
                foreach ($lista as $reg){
					
				echo"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>";
				echo	"<a class='thumbnail' href='livro.php?func=livro&id=".$reg->getId()."'>";
				echo	"<img class='img-responsive' src='http://127.0.0.1/site/fotos/".$reg->getArquivo()."' alt=''>";
				echo "<br><br><br><br><br><br><br><p>Nome: ".$reg->getNome()."</p>";
				echo "<p>Ator: ".$reg->getAutor()."</p>";
				echo "<p>Categoria: ".$reg->getCategoria()."</p>";
				echo"	</a>
					</div>";  
                }
			}
			else
			{
				$dao = new LivroDAO();
				$lista = $dao->Listar();
			
                foreach ($lista as $reg){
					
				echo"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>";
				echo	"<a class='thumbnail' href='livro.php?func=livro&id=".$reg->getId()."'>";
				echo	"<img class='img-responsive' src='http://127.0.0.1/site/fotos/".$reg->getArquivo()."' alt=''>";
				echo "<br><br><br><br><br><br><br><p>Nome: ".$reg->getNome()."</p>";
				echo "<p>Ator: ".$reg->getAutor()."</p>";
				echo "<p>Categoria: ".$reg->getCategoria()."</p>";
				echo"	</a>
					</div>";  
                }
			}
		?>
    </div>
    <!-- /.container -->
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
		<br>
		<br>
		<br>		
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
