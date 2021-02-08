<?php
session_start();
$matiere=$_POST['matiere'];
$matricule=$_POST['matricule'];
$devoir=$_POST['devoir'];
$partiel=$_POST['partiel'];
$an=$_POST['an'];

$id=$_SESSION['login'];



require_once('access.php');
$ac = new access();
$con = $ac->connection();


$req=$con->prepare("INSERT INTO `notes` (`Devoir`, `Partiel`, `Annee_Sco`, `FK_Prof`, `FK_Etud`, `FK_Ec`) VALUES ('$devoir', '$partiel', '$an', '$id', '$matricule', '$matiere') ");
$req->execute();

$data = $req->fetchAll();

 header("location: noter.php");

?>