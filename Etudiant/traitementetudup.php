<?php  
require_once('access.php');
$ac = new Access();
$con= $ac->connection();

if (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['date']&&$_POST['lieu']&&$_POST['sexe']&&$_POST['email']&&$_POST['password'])) {

$mat=$_POST['matricule'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date=$_POST['date'];
$lieu=$_POST['lieu'];
$sexe=$_POST['sexe'];
$email=$_POST['email'];
$password=$_POST['password'];

$req = $con->prepare("INSERT INTO `etudiant` (`Matricule`, `Nom_Etud`, `Prenom_Etud`, `Date_Naiss`, `Lieu_Naiss`, `Sexe`, `Email_Etud`, `Password_Etud`, `FK_ID_CLASSE`, `Fk_Id_Parent`)
					VALUES('$mat','$nom','$prenom', '$date', '$lieu', '$sexe', '$email', '$password', NULL, NULL)");

$req->execute();

header("location: loginetud.php");
}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }

?>