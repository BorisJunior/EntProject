 <?php
session_start();
$message = "";
?>



<?php
	$classe = $_POST['classe'];
	$mat = $_POST['mat'];

 

    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("UPDATE `etudiant` SET `FK_ID_CLASSE` = '$classe' WHERE `etudiant`.`Matricule` = '$mat'");
$req->execute();

header("location: pageadmin.php");
 


?>