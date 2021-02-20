<?php
session_start();
$matiere=$_POST['matiere'];
$matricule=$_POST['matricule'];
$devoir=$_POST['devoir'];
$partiel=$_POST['partiel'];
$an=$_POST['an'];

$id=$_SESSION['login'];



$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");




$query="INSERT INTO notes(devoir, partiel, annee_sco, id_prof, matricule, id_ec) VALUES ('$devoir', '$partiel', '$an', '$id', '$matricule', '$matiere') ";

pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 header("location: ../xFrontEnd/noter.php");

?>