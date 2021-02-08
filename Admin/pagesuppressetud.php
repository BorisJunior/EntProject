 <?php
session_start();
$message = "";
?>



<?php
	$classe = $_POST['classe'];
	$mat = $_POST['matetud'];

 

    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("DELETE FROM `etudiant` WHERE `etudiant`.`Matricule` = '$mat'");
$req->execute();

header("location: supetud.php");
 


?>