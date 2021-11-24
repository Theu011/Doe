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
  <link rel="stylesheet" href="criarperfilong.css">
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
          
          $acao=$database->prepare("SELECT * FROM ong WHERE idONG = ".$_SESSION['id']);
          $acao->execute();
          $info1 = $acao->fetch(PDO::FETCH_ASSOC);
          
          $acao=$database->prepare("SELECT * FROM anuncio_instituicao WHERE idONG = ".$_SESSION['id']);
          $acao->execute();
          $info2 = $acao->fetch(PDO::FETCH_ASSOC);

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

<div class="container emp-profile">
            <form enctype="multipart/form-data" action='anuncioong.php' method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src='data:image/jpeg;base64,<?php echo base64_encode($info1['imagem']) ?>'>
                            <div class="file btn btn-lg btn-primary">
                                Mudar foto
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $info1['nome']?>
                                    </h5>
                                    <h6>
                                        <?php echo $info1['endereco']?>
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sobre</a>
                                </li>
                            </ul>



                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                          
                        </div>
                    </div>
                
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type='text' name='nome' value='<?php echo $info1['nome']?>'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type='text' name='email' value='<?php echo $info1['email']?>'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type='text' name='num' value='<?php echo $info1['telefone']?>'></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Endereço</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type='text' name='endereco' value='<?php echo $info1['endereco']?>'></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Carências</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type='text' name='carencias' value='<?php echo $info2['carencia']?>'>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sobre a ONG</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><textarea name='sobre'><?php echo $info1['sobre']?></textarea></p>
                                            </div>
                                        </div>    
                           </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<script src="https://kit.fontawesome.com/03129fc35a.js"></script>
<script src="inside.js"></script>
</body>
</html>



