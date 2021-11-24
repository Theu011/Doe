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
	<link rel="stylesheet" href="messages.css">

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
			    die("<script>location.href='index.php'</script>");
			}
			$acao1=$database->prepare("SELECT * FROM chat WHERE idTransmissor = ".$_SESSION['id']." OR idReceptor = ".$_SESSION['id']);
			$acao1->execute();
			$info1=$acao1->fetchAll(PDO::FETCH_ASSOC);

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
<!--Chat design-->
<div class="container">
<h3 class=" text-center">Mensagens</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recente</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Procurar" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
          <?php 
          
          foreach($info1 as $info){
              if($info['idReceptor'] != $_SESSION['id']){
                  $acao2=$database->prepare("SELECT * FROM doador WHERE idDoador = ".$info['idReceptor']);
              }else{
                  $acao2=$database->prepare("SELECT * FROM doador WHERE idDoador = ".$info['idTransmissor']);
              }              
              $acao2->execute();
              $info2=$acao2->fetch(PDO::FETCH_ASSOC);
              echo('
                <a href="messages.php?idChat='.$info['idChat'].'">
                <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"> <img src="data:image/jpeg;base64,'.base64_encode($info2['imagem']).'" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5>'.$info2['nick'].'<span class="chat_date"></span></h5>
                      <!-- <p>Eae cuzão meu pau é grande</p> -->
                    </div>
                  </div>
                </div>
                </a>
              ');
          }
          
          if(isset($_REQUEST['idChat'])){
              $idChat = $_REQUEST['idChat'];
              $acao3=$database->prepare("SELECT * FROM mensagem WHERE idChat = ".$idChat." ORDER BY data");
              $acao3->execute();
              $info3=$acao3->fetchAll(PDO::FETCH_ASSOC);
              
              echo('
                    </div>
                </div>
                <div class="mesgs">
                  <div class="msg_history">
              ');
              
              foreach($info3 as $info){
                  if($info['idDoador'] == $_SESSION['id']){
                      echo('
                          <div class="outgoing_msg">
                              <div class="sent_msg">
                                <p>'.$info['texto'].'</p>
                                <span class="time_date"> 01:79    |    15/09/2019</span> </div>
                            </div>
                          
                      ');
                  }else{
                      $acao4=$database->prepare("SELECT imagem FROM doador WHERE idDoador = ".$info['idDoador']);
                      $acao4->execute();
                      $info4=$acao4->fetch(PDO::FETCH_ASSOC);
                      echo('
                          <div class="incoming_msg">
                              <div class="incoming_msg_img"> <img src="data:image/jpeg;base64,'.base64_encode($info4['imagem']).'" alt="sunil"> </div>
                              <div class="received_msg">
                                <div class="received_withd_msg">
                                  <p>'.$info['texto'].'</p>
                                  <span class="time_date"> 01:49    |    15/09/2019</span></div>
                              </div>
                            </div>
                      ');
                  }
              }
          }

          ?>

          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <form action='enviomensagem.php' method='post'>
                <input type="text" name='texto' class="write_msg" placeholder="Escreva sua mensagem" />
                <input type="hidden" name="idChat" value=<?php if(isset($_REQUEST['idChat'])){echo $idChat;}?> />
                <button class="msg_send_btn" type="submit" type="button"><i class="fab fa-telegram-plane" aria-hidden="true"></i></button>
              </form>
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