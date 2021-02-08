 <?php
session_start();
?>
<?php
if (isset($_SESSION['login'])) {
 header("location:pageprof.php");
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

if (isset($_POST['email'])&&isset($_POST['pass'])) {

 $login = $_POST['email'];
 $password = $_POST['pass'];

 $mdp_md5 = md5($password);

 $req = $con->prepare(" SELECT * FROM `professeur` WHERE `Email_Prof` = '$login' AND `Password_Prof` = '$password' ");
 $req->execute();
 $ligne = $req->fetch();

 if ($ligne['Id_Prof'] != "") {
  $_SESSION['login'] = $ligne['Id_Prof'];
  header("location:pageprof.php");
 }  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      INVALIDE USER INFORMATION!
     </center></div>";
  }
 
}


?>