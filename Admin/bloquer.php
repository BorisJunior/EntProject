<?php
session_start();
$semestre=$_POST['semestre'];

$id=$_SESSION['login'];



require_once('access.php');
$ac = new access();
$con = $ac->connection();


$req=$con->prepare(" UPDATE `ec` SET `Statut` = 'Bloque' WHERE `SEMESTRE` = '$semestre' ");
$req->execute();


 header("location: Matieres.php");

?>


