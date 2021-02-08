<?php
session_start();

$_SESSION['an']=$_POST['an'];

$var = 'Selectionner Année Scolaire';
 
echo $var;

if ($_SESSION['an']==$var) {

    header("pagerror.php");
} 

else {

header("Imprimer.php");
  
}

echo $var;

?> 