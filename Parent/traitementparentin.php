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

if (isset($_POST['email'])) {

 $login = $_POST['email'];
 $password = $_POST['pass'];

 $mdp_md5 = md5($password);

 $req = $con->prepare("SELECT * FROM `parent` WHERE `Email_Parent` = '$login' AND `Password_Parent` = '$password'");
 $req->execute();
 $ligne = $req->fetch();

 if ($ligne['Id_parent'] != "") {
  $_SESSION['login'] = $ligne['Id_parent'];
  header("location:Accueil.php");
 }  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      INVALIDE USER INFORMATION!
     </center></div>";
  }
 
}

?>    