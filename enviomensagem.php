<?php
session_start();
if(!$_SESSION){
    die("<script>location.href='index.php'</script>");
}

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='criarperfilong.php'</script>");
}
if($_SESSION['tipo'] == "ONG"){
    die("<script>location.href='inside.php'</script>");
}
if(isset($_POST['idChat'])){
    $idChat = $_POST['idChat'];
    $texto = $_POST['texto'];
}else{
    die("<script>location.href='messages.php'</script>");
}

$acao=$database->prepare("INSERT INTO mensagem (idChat,idDoador,data,texto) VALUES('$idChat','".$_SESSION['id']."','".date("Y-m-d H:i:s")."','$texto')");
$acao->execute();
die("<script>location.href='messages.php'</script>");