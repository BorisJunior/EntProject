<?php  
require_once('access.php');
$ac = new Access();
$con= $ac->connection();

if (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['nomE']&&$_POST['teleph']&&$_POST['email']&&$_POST['password'])) {


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$nomE=$_POST['nomE'];
$id_parent=$_POST['id_parent'];
$teleph=$_POST['teleph'];
$email=$_POST['email'];
$password=$_POST['password'];

$req = $con->prepare("INSERT INTO parent (Id_parent, Nom, Prenom, Teleph_Parent, Email_Parent, Password_Parent)
					VALUES('$id_parent','$nom','$prenom', '$teleph', '$email', '$password' )");

$req->execute();


$req2 = $con->prepare("UPDATE `etudiant` SET `Fk_Id_Parent` = '$id_parent' WHERE `etudiant`.`Matricule` = '$nomE'");

$req2->execute();


header("location: loginparent.php");
}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }


?>