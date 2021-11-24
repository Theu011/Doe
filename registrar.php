<?php

session_start();
if($_SESSION){
    die("<script>location.href='index.php'</script>");
}

$nome=$_POST['nome'];
$nick=$_POST['nick'];
$email=$_POST['email'];
$num=$_POST['num'];
$doc=$_POST['doc'];
$senha1=$_POST['senha1'];
$senha2=$_POST['senha1'];
$tipo=$_POST['tipo'];
$endereco=$_POST['endereco'];
$imagem=file_get_contents($_FILES['file']['tmp_name']);

if ($senha1!=$senha2) {
    die("<script>location.href='register.php'</script>");
}else{
    $senha=md5($senha1);
}

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='register.php'</script>");
}

if($tipo=='doador'){
    $acao=$database->prepare("INSERT INTO doador (nome,nick,email,imagem,endereco,telefone,cpf,senha) VALUES ('$nome','$nick','$email',:img,'$endereco','$num','$doc','$senha')");
}else{
    $acao=$database->prepare("INSERT INTO ong (nome,imagem,endereco,email,data,sobre,telefone,cnpj,senha) VALUES ('$nome',:img,'$endereco','$email','".date("Y-m-d")."','Sem descrição, ainda...','$num','$doc','$senha')");
}
$acao->bindParam(':img', $imagem, PDO::PARAM_STR);
$acao->execute();

if($acao){
    die("<script>location.href='login.php'</script>");
}
?>