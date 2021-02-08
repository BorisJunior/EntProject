<?php
session_start();

$log=$_SESSION['email'];
$pass=$_SESSION['pass'];

require_once('access.php');
$ac = new access();
$con = $ac->connection();


 $req=$con->prepare("SELECT * FROM `etudiant` INNER JOIN `ec` ON `etudiant`.`FK_ID_CLASSE` = `ec`.`FK_ID_CLASSE`
 											  INNER JOIN `notes` ON `notes`.`FK_Etud` = `etudiant`.`Matricule`
                                              INNER JOIN `ue` ON `ue`.`ID_UE` = `ec`.`FK_ID_UE`
 											  WHERE `Email_Etud` ='$log' AND `Password_Etud` = '$pass'
 											  AND `notes`.`FK_Ec`= `ec`.`ID_EC`
 											  ORDER BY `ID_UE` ");

$req->execute();

$data = $req->fetchAll();


$req2=$con->prepare("SELECT DISTINCT ID_UE FROM `ue` INNER JOIN `ec` ON `ec`.`FK_ID_UE` = `ue`.`ID_UE`
WHERE `FK_ID_CLASSE` ='L1A' 
AND `SEMESTRE` ='SEMESTRE 1'
ORDER BY `ID_UE`");


$req2->execute();

$data2 = $req2->fetchAll();
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>GO ADMIN</title>

</style>
</head>
<body>

	
<?php  


 	foreach ($data as $key ) {
  	$moy=((($key['Devoir'])+($key['Partiel']))/2);
	 echo' 
	 <form method="POST" action="noter.php">
    <div class="sub-cont">
        <label>
          <span>Matiere</span>
          <input type="text" name="" value="'.$key['ID_UE'].'" disabled>
          <input type="text" name="" value="'.$key['ID_EC'].'" disabled>
          <input type="text" name="" value="'.$key['LIBELLE_EC'].'" disabled>
          


        </label>
        <label>
          <span>Note de Devoir</span>
          <input type="text" name="" value="'.$key['Devoir'].'" disabled>
          <span>Note de Partiel</span>
          <input type="text" name="" value="'.$key['Partiel'].'" disabled>
   
        </label>

     
      </div>
    </div>
  </div>
  <br>
  <br>
  </form>
  '; } ?> 

</body>
</html>
