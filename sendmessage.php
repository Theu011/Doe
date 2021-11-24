<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doe!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.10.1-web/css/all.css">
	<link rel="stylesheet" href="inside.css">
	<link rel="stylesheet" href="sendmessage.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar sticky navbar-expand-md navbar-dark bg-primary ">
	<div class="container-fluid">
		<!--<a class="navbar-brand" href="#"><img src="#" alt=""></a>-->
		<a href="inside.php"><h1 class="logodoe">Doe!</h1></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<i class="fas fa-bars"></i>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="inside.php">Produtos</a>
				</li>
				<li class="nav-item">
					<i class="fas fa-plus-circle"></i>
				</li>
				<?php 
				session_start();
    			if($_SESSION['tipo'] == "ONG"){
    			    die("<script>location.href='inside.php'</script>");
    		    }else{
    				  echo('<li class="nav-item">
                      <a class="nav-link" href="CriarAnuncio.php">Adicionar anúncio</a>
                      </li>');
    				}
    				$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');
    				
    				if(!$database){
    				    die("<script>location.href='criarperfilong.php'</script>");
    				}
    				$acao=$database->prepare("SELECT * FROM doador WHERE idDoador = ".$_REQUEST['idDoador']);
    				$acao->execute();
    				$info = $acao->fetch(PDO::FETCH_ASSOC);
    		    ?>
				<li class="nav-item">
					<i class="fas fa-envelope"></i>
				</li>
				<li class="nav-item">
					<a class="nav-link link_interno" href="messages.php">Mensagens</a>
				</li>
				<?php                   
                if(!$_SESSION){
                    die("<script>location.href='index.php'</script>");
                }else{
                  if($_SESSION['tipo'] == "ONG"){
                    echo('<li class="nav-item">
                    <a class="nav-link" href="ongperfil.php">Minha Conta</a>
                    </li>');
                  }else{
                    echo('<li class="nav-item">
                    <a class="nav-link" href="minhaconta.php">Minha Conta</a>
                    </li>');
                    }
                  echo('<li class="nav-item">
                    <a class="nav-link" href="logar.php?sair=true">Sair</a>
                  </li>');
                }
                ?>
			</ul>
		</div>
	</div>
</nav>
<br>
<br>
<div class="aligncenter">
	<img src='data:image/jpeg;base64,<?php echo base64_encode($info['imagem']) ?>' class="media-photo rounded-circle">
	<h2 class="nomedoador"><?php echo $info['nome']?></h2>
</div>


<div class="container">
    <div class="row">
		<div class="col-sm-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">                
                    <form accept-charset="UTF-8" action="chamar.php" method="POST">
                    	<input type='hidden' name='idReceptor' value='<?php echo $_REQUEST['idDoador']?>'>
                    	<input type='hidden' name='idTransmissor' value='<?php echo $_SESSION['id']?>'>
                        <button class="btn btn-info" type="submit">Chamar no chat</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
<script src="inside.js"></script>
</body>
</html>



