<?php
session_start();
if(!$_SESSION){
    die("<script>location.href='index.php'</script>");
}

if($_SESSION['tipo'] == "ONG"){
    die("<script>location.href='inside.php'</script>");
}

$database=new PDO("mysql:host=localhost;dbname=doe", 'root', '1234');

if(!$database){
    die("<script>location.href='criarperfilong.php'</script>");
}

$idTransmissor=$_POST['idTransmissor'];
$idReceptor=$_POST['idReceptor'];

$acao1=$database->prepare("SELECT idTransmissor FROM chat WHERE idTransmissor = ".$idTransmissor." && idReceptor = ".$idReceptor);
$acao1->execute();
$info1 = $acao1->fetch(PDO::FETCH_ASSOC);

$acao2=$database->prepare("SELECT idTransmissor FROM chat WHERE idTransmissor = ".$idReceptor." && idReceptor = ".$idTransmissor);
$acao2->execute();
$info2 = $acao2->fetch(PDO::FETCH_ASSOC);

if($info1 == false && $idTransmissor!=$idReceptor && $info2 == false){
    $acao3=$database->prepare("INSERT INTO chat (idTransmissor,idReceptor) VALUES('$idTransmissor','$idReceptor')");
    $acao3->execute(); 
}

die("<script>location.href='messages.php'</script>");