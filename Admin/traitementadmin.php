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

if (isset($_POST['email']) && isset($_POST['pass'])) {

 $login = $_POST['email'];
 $password = $_POST['pass'];

 $mdp_md5 = md5($password);

 $req = $con->prepare("SELECT * FROM `gestion` WHERE `Admin` = '$login' AND `Password` = '$password'");
 $req->execute();
 $ligne = $req->fetch();

 if ($ligne['Admin'] != "") {
  $_SESSION['login'] = $ligne['Admin'];
  header("location:pageadmin.php");
 }  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      INVALIDE USER INFORMATION!
     </center></div>";
  }
 
}

?>    