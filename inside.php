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
				  echo('<li class="nav-item">
                  <a class="nav-link" href="criarperfilong.php">Adicionar anúncio</a>
                  </li>');
				}else{
				  echo('<li class="nav-item">
                  <a class="nav-link" href="CriarAnuncio.php">Adicionar anúncio</a>
                  </li>');
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
<!--Painel-->
<div class="container">
	<div class="row">

		<section class="content">
			<h1>Doação</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btnrosa btn-filter btnespaco" data-target="Doador">Doador</button>
								<button type="button" class="btn btn-secondary btn-filter btnespaco" data-target="ONG">ONGS</button>
								<button type="button" class="btn btn-default btn-filter btnespaco" data-target="all">Todos</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								<?php 
								$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');
								
								if(!$database){
								    die("<script>location.href='criarperfilong.php'</script>");
								}
								
								$acao1=$database->prepare("SELECT * FROM anuncio_doador ORDER BY data");
								$acao1->execute();
								$info1=$acao1->fetchAll(PDO::FETCH_ASSOC);
								
								$acao2=$database->prepare("SELECT * FROM anuncio_instituicao ORDER BY data");
								$acao2->execute();
								$info2=$acao2->fetchAll(PDO::FETCH_ASSOC);
																
								foreach($info2 as $info){
								    echo('
        							<tr data-status="ONG">
        								<td>
        									<a href="javascript:;" class="star">
        										<i class="glyphicon glyphicon-star"></i>
        									</a>
        								</td>
        								<td>
        									<div class="media">
        										<a href="ongperfil.php?idOng='.$info['idONG'].'" class="pull-left">
        											<img src="data:image/jpeg;base64,'.base64_encode($info['foto']).'" class="media-photo">
        										</a>
        										<a href="ongperfil.php?idOng='.$info['idONG'].'">
        											<div class="media-body">
        												<span class="media-meta pull-right">'.date('d/m/Y', strtotime($info['data'])).'</span>
        												<h4 class="title">
        													'.$info['carencia'].'
        													<span class="pull-right menino">(ONG)</span>
        												</h4>
        												<p class="summary">'.$info['descricao'].'</p>
        											</div>
        										</a>
        									</div>
        								</td>
        							</tr>
                                    ');
								}
								foreach($info1 as $info){
								    echo('
								<tr data-status="Doador">
									<td>
										<a href="javascript:;" class="star">
											<i class="glyphicon glyphicon-star"></i>
										</a>
									</td>
									<td>
										<div class="media">
											<a href="sendmessage.php?idDoador='.$info['idDoador'].'" class="pull-left">
												<img src="data:image/jpeg;base64,'.base64_encode($info['foto']).'" class="media-photo">
											</a>
											<a href="sendmessage.php?idDoador='.$info['idDoador'].'">
												<div class="media-body">
													<span class="media-meta pull-right">'.date('d/m/Y', strtotime($info['data'])).'</span>
													<h4 class="title">
														'.$info['titulo'].'
														<span class="pull-right menina">(Doador)</span>
													</h4>
													<p class="summary">'.$info['descricao'].'</p>
                                                    <p class="summary">Roupa: '.$info['tipo'].' de tamanho '.$info['tamanho'].'</p>
                                                    <p class="summary">Endereco: '.$info['endereco'].'</p>
												</div>
											</a>
										</div>
									</td>
								</tr>
                                ');
								}
							    ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	</div>
</div>
<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
<script src="inside.js"></script>
</body>
</html>