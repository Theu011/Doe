<?php
session_start();
if($_SESSION){
    if($_REQUEST['sair'] == true){
        session_destroy();
        die("<script>location.href='index.php'</script>");
    }
    die("<script>alert('Já logado');location.href='index.php'</script>");
}

$email=$_POST['email'];
$tipo=$_POST['tipo'];
$senha=md5($_POST['senha']);

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='register.php'</script>");
}

if($tipo=='doador'){
    $acao=$database->prepare("SELECT * FROM doador WHERE email = '$email' && senha = '$senha'");
}else{
    $acao=$database->prepare("SELECT * FROM ong WHERE email = '$email' && senha = '$senha'");
}

$acao->execute();
$info = $acao->fetch(PDO::FETCH_ASSOC);

if($info){
    if($info!=NULL && $tipo=='ong'){
        $_SESSION['tipo'] = "ONG";
        $_SESSION['id'] = $info['idONG'];
    }elseif($info!=NULL && $tipo=='doador'){
        $_SESSION['tipo'] = "doador";
        $_SESSION['id'] = $info['idDoador'];
        
    }
        
    
    
}else{
    die("<script>location.href='login.php'</script>");
}

die("<script>location.href='inside.php'</script>");

?>