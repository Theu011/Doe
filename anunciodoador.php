<?php
session_start();
if(!$_SESSION){
    die("<script>location.href='index.php'</script>");
}

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='criarperfilong.php'</script>");
}

$idDoador=$_SESSION['id'];
$titulo=$_POST['titulo'];
$encontro=$_POST['encontro'];
$descricao=$_POST['descricao'];
$tipo=$_POST['tipo'];
$tamanho=$_POST['tamanho'];

$acao1=$database->prepare("SELECT imagem FROM anuncio_doador WHERE idDoador = ".$idDoador);
$acao1->execute();
$info1 = $acao1->fetch(PDO::FETCH_ASSOC);

if($_FILES['file']['type']==false){
    $imagem=$info1['imagem'];
}elseif($_FILES['file']['type']!=false){
    $imagem=file_get_contents($_FILES['file']['tmp_name']);
}

$acao2=$database->prepare("SELECT * FROM anuncio_doador WHERE idDoador = ".$idDoador);
$acao2->execute();
$info2 = $acao2->fetch(PDO::FETCH_ASSOC);
;

if($info2 != false){
    $acao3=$database->prepare("UPDATE anuncio_doador SET titulo='$titulo',data='".date('Y/m/d')."',foto=:img,endereco='$encontro',descricao='$descricao',tipo='$tipo',tamanho='$tamanho' WHERE idDoador='$idDoador'");
    $acao3->bindParam(':img', $imagem, PDO::PARAM_STR);
    $acao3->execute();
}else{
    $acao3=$database->prepare("INSERT INTO anuncio_doador (idDoador,titulo,foto,endereco,descricao,data,tipo,tamanho) VALUES('$idDoador','$titulo',:img,'$encontro','$descricao','".date('Y/m/d')."','$tipo','$tamanho')");
    $acao3->bindParam(':img', $imagem, PDO::PARAM_STR);
    $acao3->execute();
}

die("<script>location.href='inside.php'</script>");