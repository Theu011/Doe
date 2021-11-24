<?php 
session_start();
if($_SESSION){
    die("<script>alert('J� logado');location.href='index.php'</script>");
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="style.css">
  <title>Minha conta</title>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.10.1-web/css/all.css">
  <script src="https://kit.fontawesome.com/03129fc35a.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>
<body>

  <!---NAVBAR-->
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
          <a class="nav-link" href="index.php#tiposdedoacoes">Tipos de doações</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#sobrenos">Sobre nós</a>
        </li>
        <li class="nav-item">
					<a class="nav-link link_interno" href="index.php#depoimentos">Depoimentos</a>
				</li>
        <li class="nav-item">
          <i class="fas fa-user"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Minha Conta</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--Form login-->
  <section class="container-fluid bg">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6 col-md-3">
        <form class="form-container" action='logar.php' method='post'>
          <h1 class="logodoeform">Doe!</h1>
          <div class="form-inline botoesradio">

            <div class="custom-control custom-checkbox my-1 mr-sm-2">
              <input type="radio" class="custom-control-input" name="tipo"  value="ong" id="customControlInline1" required>
              <label class="custom-control-label" for="customControlInline1">ONG</label>
            </div>
            <div class="custom-control custom-checkbox my-1 mr-sm-2">
              <input type="radio" class="custom-control-input" name="tipo" value="doador" id="customControlInline2" required>
              <label class="custom-control-label" for="customControlInline2">Pessoa</label>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" name='senha' id="exampleInputPassword1" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-primary btn-block botaologin">Login</button>
          <a href="#" class="esquecisenha"><p>Esqueci minha senha</p></a>
          <a href="register.php" class="criarconta"><p>Não tem conta? Criar conta agora</p></a>
        </form>
      </div>
    </div>
  </section>
  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/03129fc35a.js"></script>

</body>
</html>