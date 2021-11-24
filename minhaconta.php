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
    <link rel="stylesheet" href="minhaconta.css">
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
                                
                $acao=$database->prepare("SELECT * FROM doador WHERE idDoador = ".$_SESSION['id']);
                $acao->execute();
                $info = $acao->fetch(PDO::FETCH_ASSOC);
                
				if($_SESSION['tipo'] == "ONG"){
				  die("<script>location.href='inside.php'</script>");
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
                      die("<script>location.href='inside.php'</script>");
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
    <div class="row">
        <div class=" col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <img class="img-circle img-responsive" src='data:image/jpeg;base64,<?php echo base64_encode($info['imagem']) ?>'>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <div itemscope="" itemtype="http://schema.org/Person">
                                        <h2> <span itemprop="name"><?php echo $info['nome']?></span></h2>
                                        <p itemprop="jobTitle"><?php echo $info['telefone']?></p>
                                        <p><span itemprop="affiliation"><?php echo $info['cpf']?></span></p>
                                        <p>
                                            <i class="fa fa-map-marker"></i> <span itemprop="addressRegion"><?php echo $info['endereco']?></span>
                                        </p>
                                        <p itemprop="email"> <i class="fa fa-envelope"> </i> <a href="mailto:you@somedomain.com"><?php echo $info['email']?></a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div id="social-links" class=" col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="google" class="btn btn-social btn-block btn-google" target="_BLANK" href="http://plus.google.com/+You/">
                                        <i class="fa fa-google"></i> +You
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="twitter" class="btn btn-social btn-block btn-twitter" target="_BLANK" href="http://twitter.com/yourid">
                                        <i class="fa fa-twitter"></i> /yourid
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="github" class="btn btn-social btn-block btn-github" target="_BLANK" href="http://github.com/yourid">
                                        <i class="fa fa-github"></i> /yourid
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="stackoverflow" class="btn btn-social btn-block btn-stackoverflow" target="_BLANK" href="http://stackoverflow.com/users/youruserid/yourid">
                                        <i class="fa fa-stack-overflow"></i> /yourid
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
<script src="inside.js"></script>
</body>
</html>



