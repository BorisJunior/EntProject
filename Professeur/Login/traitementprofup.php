<?php  


if (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['teleph']&&$_POST['email']&&$_POST['password'])) {

	$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


$id=$_POST['id_prof'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$teleph=$_POST['teleph'];
$email=$_POST['email'];
$password=$_POST['password'];

$query = "INSERT INTO professeur (id_prof, nom_prof, prenom_prof, teleph_prof, photoprof, email_prof, password_prof)
					VALUES('$id','$nom','$prenom', '$teleph', NULL, '$email', '$password')";


$result = pg_query($db_handle, $query);


$query2 = "INSERT INTO dispensercours (id_prof, id_classe, id_ec)
					VALUES('$id',NULL, NULL)";


$result2 = pg_query($db_handle, $query2);


header("location: LoginProf.php");
}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }

?>