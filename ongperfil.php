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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="ongperfil.css">
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
			$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');
			
			if(!$database){
			    die("<script>location.href='index.php'</script>");
			}
									
			if(isset($_REQUEST['idOng'])){
			    $id = $_REQUEST['idOng'];
			}elseif($_SESSION['tipo'] == "ONG"){
			    $id = $_SESSION['id'];
			}else{
			    die("<script>location.href='inside.php'</script>");
			}
			
			
			$acao=$database->prepare("SELECT * FROM ong WHERE idONG = ".$id);
			$acao->execute();
			$info = $acao->fetch(PDO::FETCH_ASSOC);

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
<div class="main-content">
	<div class="container mt-7">
		<!-- Table -->
		<div class="row">
			<div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
				<div class="card card-profile shadow">
					<div class="row justify-content-center">
						<div class="col-lg-3 order-lg-2">
							<div class="card-profile-image">
								<a href="#">
									<img class='rounded-circle' src='data:image/jpeg;base64,<?php echo base64_encode($info['imagem']) ?>'>
								</a>
							</div>
						</div>
					</div>
					<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
					</div>
					<div class="card-body pt-0 pt-md-4">
						<div class="row">
							<div class="col">
								<div class="card-profile-stats d-flex justify-content-center mt-md-5">
								</div>
							</div>
						</div>
						<div class="text-center">
							<h3><?php echo $info['nome']?></h3>
							<div class="h5 font-weight-300">
								<i class="ni location_pin mr-2"></i><?php echo $info['endereco']?>
							</div>
							<div class="h5 mt-4">
								<i class="ni business_briefcase-24 mr-2"></i><?php echo date('d/m/Y', strtotime($info['data']))?> (Data de cadastro da Ong)
							</div>
							<div>
								<i class="ni education_hat mr-2"></i>Sobre a Ong
							</div>
							<hr class="my-4">
							<p><?php echo $info['sobre']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="row align-items-center justify-content-xl-between">
		<div class="col-xl-6 m-auto text-center">
			<div class="copyright">
				
			</div>
		</div>
	</div>
</footer>
<!--Imagens-->
<div class="tab-content gallery">
            <div class="tab-pane active" id="home" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
              	<h4 class="fontetrabongs">Trabalhos feitos pela Ong</h4>
                <div class="row collections">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg6.jpg" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg11.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg3.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/img/bg6.jpg" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
          </div>

		
	

<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
<script src="inside.js"></script>
</body>
</html>



