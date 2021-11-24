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
</head>
<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary ">
	<div class="container-fluid">
		<!--<a class="navbar-brand" href="#"><img src="#" alt=""></a>-->
		<a href="index.php"><h1 class="logodoe">Doe!</h1></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link_interno" href="#tiposdedoacoes">Tipos de doações</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link_interno" href="#sobrenos">Sobre nós</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link_interno" href="#depoimentos">Depoimentos</a>
				</li>
				<li class="nav-item">
					<i class="fas fa-user"></i>
				</li>
				<?php 
				session_start();
                  
                if(!$_SESSION){
                  echo('<li class="nav-item">
                  <a class="nav-link" href="login.php">Logar</a>
                  </li>');
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

<!--- Image Slider--> 
<!--
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/bebecomfundoroxo.png" alt="">
			<div class="carousel-caption">
				<h1 class="display-2">Doe!</h1>
				<h3>Por que doar não dói!</h3>
-->
				<!--<button type="button" class="btn btn-outline-light btn-lg">View Demo</button>-->
				<!--
				<button type="button" class="btn btn-primary btn-lg">Começe agora!</button>
			</div>
		</div>
		<div class="carousel-item">
			<img src="img/imagemsofrimento1.png" alt="">
		</div>
		<div class="carousel-item">
			<img src="img/imagemsofrimento2.png" alt="">
		</div>
	</div>	
</div>
-->
<!--- Jumbotron -->
<!--- <div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">A web hosting bla bla bla bla bla bla tha allows individuals and organizations to make their web sites accesibles via world wide web.</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Web Hosting</button></a>
		</div>
	</div>
</div> --->
<!--Banner start-->
<br>
<br>
<!--- Welcome Section -->
<br>
<br>
<section  class="tiposdedoacoes" id="tiposdedoacoes">
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Junte-se a nós para fazer a diferença</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut tortor feugiat, efficitur turpis ut, venenatis arcu. Etiam nunc augue, efficitur id tortor at, efficitur convallis urna. Morbi pulvinar convallis augue at malesuada. Nam facilisis dolor lorem, aliquam facilisis ex bibendum a. Morbi malesuada massa sodales, euismod metus sed, vestibulum augue. Nulla fermentum magna ultrices, eleifend nisi a, sagittis orci. Nam gravida lectus dui, sit amet congue libero pellentesque vel. Nulla consequat tempor tellus sed luctus. In mollis, ex eu accumsan molestie, nunc enim tempor arcu, commodo ultricies nulla ex eget mi. Maecenas tempus neque facilisis, pellentesque velit blandit, lobortis augue. Integer nec tellus et enim sodales volutpat.</p>
		</div>
	</div>
</div>

<!--- Three Column Section -->

	<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<i class="fas fa-building"></i>
				<h3>ONGS</h3>
				<p>Doe diretamente para ongs e torne o mundo um lugar melhor</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<img src="img/baby-solidcor.svg" width="56px" height="64px" alt="" class="iconfontawesome">
				<h3>Diretamente para pessoa</h3>
				<p>Marque um encontro e doe diretamente para a pessoa e também deixe o mundo melhor</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<img src="img/hands-solid.svg" width="56px" height="64px" alt="" class="iconfontawesome">
				<h3>Receba a doação</h3>
				<p>Anúncie o que precisa e ganhe muitos presentes</p>
			</div>
		</div>
		
	</div>
</section>
<hr class="my-4">

<!--- Two Column Section -->
<div class="container-fluid padding">
	<div class="row padding" id="sobrenos">
		<div class="col-md-12 col-lg-6">
			<h2>Nosso propósito!</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut tortor feugiat, efficitur turpis ut, venenatis arcu. Etiam nunc augue, efficitur id tortor at, efficitur convallis urna. Morbi pulvinar convallis augue at malesuada. Nam facilisis dolor lorem, aliquam facilisis ex bibendum a. Morbi malesuada massa sodales, euismod metus sed, vestibulum augue. Nulla fermentum magna ultrices, eleifend nisi a, sagittis orci. Nam gravida lectus dui, sit amet congue libero pellentesque vel. Nulla consequat tempor tellus sed luctus. In mollis, ex eu accumsan molestie, nunc enim tempor arcu, commodo ultricies nulla ex eget mi. Maecenas tempus neque facilisis, pellentesque velit blandit, lobortis augue. Integer nec tellus et enim sodales volutpat.</p>
			<p>Nulla vestibulum egestas sapien, in venenatis velit dictum sit amet. Aliquam erat volutpat. Quisque id finibus mauris. Nunc pellentesque eros velit. Quisque euismod lacus non eros tempor, in maximus felis sodales. Praesent vitae luctus dolor. Pellentesque pellentesque, ligula non feugiat dignissim, erat tellus porta dolor, eu condimentum tellus est vel elit. Maecenas ante dolor, porttitor vel placerat interdum, efficitur ac sapien. Duis blandit eleifend dignissim.</p>
			<br>
			<a href="#" class="btn btn-primary">Doe agora mesmo</a>
		</div>
		<div class="col-lg-6">
			<img src="img/desk.png" alt="" class="img-fluid">
		</div>
	</div>
</div>

<hr class="my-4">

<!--- Fixed background -->



<!--- Emoji Section -->

  
<!--- Meet the team -->
 <div class="container-fluid padding" id="depoimentos">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Depoimentos</h1>
		</div>
		<hr>
	</div>
</div>
<!--- Cards -->
 <div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/person1.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Mariana</h4>
					<p class="card-text">“Acho um trabalho lindo. Não pensam só em si, pensam também no próximo. Mais pessoas deveriam ter esse coração.”</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/person2.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Renato</h4>
					<p class="card-text">“Aqui é uma oportunidade de ajudar o próximo com coisas que talvez não sirva para você mais é de extrema importância para outra pessoa.”</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/person3.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Gabriela</h4>
					<p class="card-text">“Acho um trabalho lindo. Sinto que estou contribuindo com o mundo de alguma forma.”</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- Two Column Section -->
<!--
<section id="sobrenos">
	<div class="container-fluid padding">
		<div class="row padding">
			<div class="col-md-12 col-lg-6">
				<h2>Sobre nós</h2>
				<p>Nulla vestibulum egestas sapien, in venenatis velit dictum sit amet. Aliquam erat volutpat. Quisque id finibus mauris. Nunc pellentesque eros velit. Quisque euismod lacus non eros tempor, in maximus felis sodales.Praesent vitae luctus dolor. Pellentesque pellentesque, ligula non feugiat dignissim, erat tellus porta dolor, eu condimentum tellus est vel elit. Maecenas ante dolor, porttitor vel placerat interdum, efficitur ac sapien. Duis blandit eleifend dignissim.</p>
				<p>Nam egestas dui non facilisis mattis. Donec vitae orci convallis, scelerisque turpis nec, suscipit tortor. Fusce lobortis nulla vel sodales ornare. Aenean eleifend dolor turpis, in blandit enim vehicula eget. Duis vitae nisi quis nibh eleifend eleifend. In risus massa, tempor nec ante vel, viverra convallis justo. Sed a velit mollis, convallis justo vitae, mattis odio. Vestibulum ornare ornare tortor in mattis. Pellentesque tincidunt scelerisque pretium. Sed semper hendrerit pretium.</p>
				<br>
			</div>
			<div class="col-lg-6">
				<img src="img/donate-image.jpg" alt="" class="img-fluid">
			</div>
		</div>
		
	</div>
-->
<hr class="my-4">
<!--- Connect -->
	<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-md-12">
				<h2>Nossas Redes Sociais</h2>
			</div>
			<div class="col-md-12 social padding">
				<a href="#" class="social-media"><i class="fab fa-facebook"></i></a>
				<a href="#" class="social-media"><i class="fab fa-twitter "></i></a>
				<a href="#" class="social-media"><i class="fab fa-instagram social-media"></i></a>
			</div>
		</div>
	</div>
</section>
<!--- Footer -->

<script src="app.js"></script>
<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
</body>
</html>