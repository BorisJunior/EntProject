<?php
	$classe = $_POST['classe'];
	$mat = $_POST['mat'];
	$ec = $_POST['ec'];

    require_once('access.php');

    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("DELETE FROM `dispenser` WHERE `dispenser`.`Fk_Id_Prof` = '$mat'
 											  AND `dispenser`.`Fk_Id_Classe` = '$classe'
 											  AND `dispenser`.`Fk_Id_ec` = '$ec'");
$req->execute();

header("location: voirmatiere.php");
 


?>