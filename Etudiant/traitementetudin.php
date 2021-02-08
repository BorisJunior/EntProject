<?php

session_start();
?>
<?php
if (isset($_SESSION['login'])) {
 header("location:Accueil.php");
}else {
   echo "<div class='alert alert-danger' role='alert'><center>
      INVALIDE USER INFORMATION!
     </center></div>";
  }
 
?>


<?PHP
$message = '';
require_once('access.php');

$ac = new Access();
$con = $ac->connection();

if (!empty($_POST['email']&&$_POST['pass'])) {

 $login = $_POST['email'];
 $password = $_POST['pass'];

 $mdp_md5 = md5($password);

 $req = $con->prepare(" SELECT * FROM `etudiant` WHERE `Email_Etud` = '$login' AND `Password_Etud` = '$password' ");
 $req->execute();
 $ligne = $req->fetch();

 

 if ($ligne['Matricule'] != "" && $ligne['FK_ID_CLASSE'] != "") {
  $_SESSION['login'] = $ligne['Matricule'];
  header("location:Accueil.php");
 }  else if ($ligne['FK_ID_CLASSE'] = "") { 

   echo "<div class='alert alert-danger' role='alert'><center>
   ATTRIBUTION DE CLASSE NON EFFECTUEE, VEUILLEZ PATIENTER OU CONTACTER L'ADMIN
     </center></div>";

 } else
  {
  echo "<div class='alert alert-danger' role='alert'><center>
      INVALIDE USER INFORMATION!
     </center></div>";
  }

}
else {
   echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
}

?>