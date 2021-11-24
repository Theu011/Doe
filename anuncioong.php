<?php
session_start();
if(!$_SESSION){
    die("<script>location.href='index.php'</script>");
}

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='criarperfilong.php'</script>");
}

$idONG=$_SESSION['id'];
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];
$sobre=$_POST['sobre'];
$num=$_POST['num'];
$carencias=$_POST['carencias'];

$acao0=$database->prepare("SELECT imagem FROM ong WHERE idONG = ".$idONG);
$acao0->execute();
$info0 = $acao0->fetch(PDO::FETCH_ASSOC);



if($_FILES['file']['type']==false){
    $imagem=$info0['imagem'];
}elseif($_FILES['file']['type']!=false){
    $imagem=file_get_contents($_FILES['file']['tmp_name']);
}

$acao1=$database->prepare("UPDATE ong SET nome='$nome',endereco='$endereco',imagem=:img,email='$email',sobre='$sobre',telefone='$num'");
$acao1->bindParam(':img', $imagem, PDO::PARAM_STR);

$acao1->execute();

$acao2=$database->prepare("SELECT * FROM anuncio_instituicao WHERE idONG = ".$idONG);
$acao2->execute();
$info2 = $acao2->fetch(PDO::FETCH_ASSOC);

if($info2 != false){
    $acao3=$database->prepare("UPDATE anuncio_instituicao SET idONG='$idONG',nome='$nome',foto=:img,carencia='$carencias',email='$email',telefone='$num',descricao='$sobre',data='".date("Y-m-d")."',endereco='$endereco'");
    $acao3->bindParam(':img', $imagem, PDO::PARAM_STR);
    $acao3->execute();
}else{
    $acao3=$database->prepare("INSERT INTO anuncio_instituicao (idONG,nome,foto,carencia,email,telefone,descricao,data,endereco) VALUES('$idONG','$nome',:img,'$carencias','$email','$num','$sobre','".date("Y-m-d")."','$endereco')");
    $acao3->bindParam(':img', $imagem, PDO::PARAM_STR);
    $acao3->execute();
}
die("<script>location.href='ongperfil.php'</script>");