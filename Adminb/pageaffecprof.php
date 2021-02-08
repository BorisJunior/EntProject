<?php 

 	$mat = $_POST['mat'];
    $classe = $_POST['classe'];

    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

 $req=$con->prepare("SELECT * FROM `ec`  WHERE `FK_ID_CLASSE`= '$classe'");

$req->execute();

$data = $req->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bienvenue Cher Administrateur</title>
  <meta charset="UTF-8">
</head>
<body>
  <form method="POST" action="traitementaffecprof.php">
  <div class="cont">
    
      <label>
        <span>Matricule du Prof</span>
        <?php 
       echo'<input type="hidden" name="mat" value="'.$mat.'" >';
        echo'<input type="text" value="'.$mat.'"disabled >'; ?>
      </label>

      <label>
        <span>Classe Choisie</span>
        <?php 
       echo'<input type="hidden" name="classe" value="'.$classe.'" >';
       echo'<input type="text"  value="'.$classe.'" disabled >'; ?>
      </label>

	      <label>
	     

        <span>Choisir une matière enseignée</span>

         	<select name="ec" >
		<?php  
          	foreach ($data as $key ) {
			echo "<option value='".$key['LIBELLE_EC']."'>".$key['LIBELLE_EC']."</option>";
         }
 	?>
      </select>
      </label>
         <button type="submit">
    Launch demo modal
</button>

    </form>
</body>
</html>

