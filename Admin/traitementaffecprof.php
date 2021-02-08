<?php
	$mat = $_POST['mat'];
	$classe = $_POST['classe'];
    $ec = $_POST['ec'];
    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("UPDATE `dispenser` SET `Fk_Id_ec` = (SELECT `ID_EC` FROM `ec` WHERE `LIBELLE_EC`= '$ec' AND  
 															`FK_ID_CLASSE` = '$classe') 
 															WHERE `FK_Id_Prof` = '$mat' ");
 $req->execute();

$req2=$con->prepare("UPDATE `dispenser` SET `Fk_Id_Classe` = '$classe' WHERE `FK_Id_Prof` = '$mat'");
 $req2->execute();

  header("location: Professeurs.php");
?>

