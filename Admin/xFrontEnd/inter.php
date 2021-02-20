<?php
session_start();

if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}


$_SESSION['ident']=$_POST['id'];
$_SESSION['nom']=$_POST['profnom'];
$_SESSION['prenom']=$_POST['profprenom'];

$id=$_SESSION['login'];

header("location: voirmatiere.php");

?>