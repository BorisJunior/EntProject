<?php
session_start();
if (!empty($_POST['annee_sco'])) {


$_SESSION['matierelib']=$_POST['matierelib'];
$_SESSION['classe']=$_POST['classe'];;
$_SESSION['matiere']=$_POST['matiere'];
$_SESSION['an']=$_POST['annee_sco'];

$id=$_SESSION['login'];

header("location: noter.php");


}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER L'ANNEE SCOLAIRE
     </center></div>";
  }




?>