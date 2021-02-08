<?php  
require_once('access.php');
$ac = new Access();
$con= $ac->connection();

if (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['teleph']&&$_POST['email']&&$_POST['password'])) {

$id=$_POST['id_prof'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$teleph=$_POST['teleph'];
$email=$_POST['email'];
$password=$_POST['password'];

$req = $con->prepare("INSERT INTO `professeur` (`Id_Prof`, `Nom_Prof`, `Prenom_Prof`, `Teleph_Prof`, `Email_Prof`, `Password_Prof`)
					VALUES('$id','$nom','$prenom', '$teleph', '$email', '$password')");

$req->execute();

$req2 = $con->prepare("INSERT INTO `dispenser` (`FK_Id_Prof`,`FK_Id_Classe`, `FK_Id_ec`)
					VALUES('$id',NULL, NULL)");

$req2->execute();

header("location: LoginProf.php");
}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }

?>