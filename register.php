<!DOCTYPE html>
<html>
<head>
  <title>Cadastre-se</title>
  <link rel="stylesheet" href="register.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/03129fc35a.js"></script>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.10.1-web/css/all.css">
  <link rel="stylesheet" href="style.css">
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
            <a class="nav-link" href="index.php#tiposdedoacoes">Tipos de doações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#sobrenos">Sobre nós</a>
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
  <br>
  <br>

<!--Form Cadastro-->
  <div class="container">   
    <hr>
    <div class="card bg-light">
      <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Crie sua conta</h4>
        <p class="text-center">Comece a doar agora</p>
        <p>
          <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Entrar pelo Twitter</a>
          <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Entrar pelo facebook</a>
        </p>
        <p class="divider-text">
          <span class="bg-light">OU</span>
        </p>
        <form enctype="multipart/form-data" action='registrar.php' method='post'>
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
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-address-book"></i></span>
            </div>
            <input class="form-control" name="nome" placeholder="Digite seu Nome Completo" type="text" required> 
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-smile"></i></span>
            </div>
            <input class="form-control" name="nick" placeholder="Digite seu Nome de Usuário" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-image"><i class=""></i></span>
            </div>
            <input class="form-control" name="file" type="file" required>
          </div>
           <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
            </div>
            <input class="form-control" name="email" placeholder="Digite seu email" type="email" required>
          </div> 
          <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map"></i></span>
            </div>
            <input class="form-control" name="endereco" placeholder="Digite seu endereco" type="text" required>
          </div> 
          <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input class="form-control" name="num" placeholder="Digite seu Número de telefone" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <input class="form-control" name="doc" placeholder="Digite seu CPF/CNPJ" type="text" required>
          </div>
          <!-- form-group// -->
          <!-- form-group end.// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" name='senha1' placeholder="Digite sua senha" type="password" required>
          </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" name='senha2' placeholder="Repita sua senha" type="password" required>
          </div> <!-- form-group// -->                                      
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Criar conta</button>
          </div> <!-- form-group// -->      
          <p class="text-center">Já tem uma conta?<a href="login.php">Log In</a> </p>                                                                 
        </form>
      </article>
    </div> <!-- card.// -->

  </div> 
  <!--container end.//-->

  <br><br>
</body>
</html>