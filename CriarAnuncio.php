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
	<link rel="stylesheet" href="CriarAnuncio.css">
	<link rel="stylesheet" href="image.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary ">
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
		    $database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');
		    if(!$database){
		        die("<script>location.href='index.php'</script>");
		    }
		    
			if($_SESSION['tipo'] == "ONG"){
			  echo('<li class="nav-item">
              <a class="nav-link" href="criarperfilong.php">Adicionar anúncio</a>
              </li>');
			}else{
			  echo('<li class="nav-item">
              <a class="nav-link link_interno" href="#tiposdedoacoes">Adicionar anúncio</a>
              </li>');

			  $acao=$database->prepare("SELECT * FROM anuncio_doador WHERE idDoador = ".$_SESSION['id']);
			  $acao->execute();
			  $info = $acao->fetch(PDO::FETCH_ASSOC);
			}
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

<div class="container">
	<div class="row destacados">  
		<div class=" col-md-10">
			<div class="box1">
				<h4>Crie o seu Anuncio</h4>
			</div>
		</div>
	</div>
	
	<div class="col-md-5">
		<div class="main-login main-center">
			<form enctype="multipart/form-data" class="form-horizontal" method="post" action="anunciodoador.php">
				<div class="row destacados">  
					<div class=" col-md-10">
						<div class="box2">
							<h4>Título Anúncio</h4>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="cols-sm-12">
						<input type="text" class="form-control" id="formGroupExampleInput" name='titulo' value='<?php echo $info['titulo']?>' placeholder="Digite o título do seu anúncio aqui">
					</div>
				</div>
				<div class="row destacados">  
					<div class=" col-md-10">
						<div class="box2">
							<h4>Ponto de Encontro</h4>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="cols-sm-12">
						<input type="text" class="form-control" id="formGroupExampleInput" name='encontro' value='<?php echo $info['endereco']?>' placeholder="Ex: Metro Carandiru">
					</div>
				</div>
				<div class="row destacados">  
					<div class=" col-md-10">
						<div class="box2">
							<h4>Descrição do Produto</h4>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="cols-sm-12">
						<textarea id="" cols="30" rows="10" name="descricao" class="form-control descricao"><?php echo $info['descricao']?></textarea>
					</div>
				</div>
				<div class="row destacados">  
					<div class=" col-md-10">
						<div class="box2">
							
							<h4> Tipo de Produto</h4>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="cols-md-7">
						<select name='tipo' class="form-control">
							<option value="Camisa">Roupa</option>
							<option value="Casaco">Cesta Básica</option>
							<option value="Body">Móvel</option>
							<option value="Calça">Calçado</option>
							<option value="Shorts">Outros</option>
						</select>
					</div>
				</div>

			</div>
			
				<div class="form-group">
				<div class="col-md-7">
					<div class="file-upload">
						<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Adicione imagem do produto</button>
						<div class="image-upload-wrap">
							<input class="file-upload-input" name='file' type='file' onchange="readURL(this);" accept="image/*" />
							<div class="drag-text">
								<h3>Arraste e solte um arquivo ou clique em selecionar imagem</h3>
							</div>
						</div>
						<div class="file-upload-content">
							<img class="file-upload-image" src="#" alt="your image" />
							<div class="image-title-wrap">
								<button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
							</div>
						</div>
					</div>
					<br>
					<br>
		         	<button type="submit" class="btn btn-primary btn-block botaologin">Criar anúncio</button>

				</div>
			</div>
		

			<br>
			<br>
			<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			

			<!------ Include the above in your HEAD tag ---------->







		</body>
		</html>
