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
$req=$con->prepare("DELETE FROM `dispenser` WHERE `dispenser`.`Fk_Id_Prof` = '$mat'");
$req->execute();

$req2=$con->prepare("DELETE FROM `professeur` WHERE `professeur`.`Id_Prof` = '$mat'");
$req2->execute();

header("location: supprof.php");
 


?>