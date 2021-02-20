<?php
session_start();


if ($_SESSION['login']) {
	$id=$_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


} else {
 
  header("location: pagerror.php");
}

	$classe = $_POST['classe'];
	$mat = $_POST['mat'];
	$ec = $_POST['ec'];


 $query="DELETE FROM dispensercours WHERE id_prof = '$mat'
 											  AND id_classe = '$classe'
 											  AND id_ec = '$ec'";

pg_query($db_handle, $query) or die("Cannot execute query: $query\n");

header("location: ../xFrontEnd/voirmatiere.php");
 


?>