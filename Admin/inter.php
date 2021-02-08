<?php
session_start();



$_SESSION['ident']=$_POST['id'];
$_SESSION['nom']=$_POST['profnom'];
$_SESSION['prenom']=$_POST['profprenom'];

$id=$_SESSION['login'];

header("location: voirmatiere.php");

?>