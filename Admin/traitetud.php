 <?php
session_start();
$message = "";
?>



<?php
	$classe = $_POST['classe'];
	$mat = $_POST['matetud'];
	$an=$_POST['annee_sco'];

 

    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("UPDATE `etudiant` SET `FK_ID_CLASSE` = '$classe' WHERE `Matricule` = '$mat'");
$req->execute();

$req2=$con->prepare("UPDATE `etudiant` SET `Fk_Id_An` = '$an' WHERE `Matricule` = '$mat'");
$req2->execute();

header("location: misetud.php");
 


?>