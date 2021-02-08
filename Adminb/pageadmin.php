 <?php
session_start();



    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

  $req=$con->prepare("SELECT * FROM `professeur`  WHERE `Id_Prof` IN (SELECT `FK_Id_Prof` FROM `dispenser` WHERE `FK_Id_Classe` is NULL) ");
  $req->execute();
  $data = $req->fetchAll();

  $req2=$con->prepare("SELECT * FROM `etudiant`  WHERE `FK_ID_CLASSE` IS NULL ");
  $req2->execute();
  $data2 = $req2->fetchAll();


 $req3=$con->prepare("SELECT * FROM `professeur` INNER JOIN `dispenser` ON  `Id_Prof` = `FK_Id_Prof` INNER JOIN `ec` ON `Fk_Id_ec`=`ID_EC` WHERE `Id_Prof` IN (SELECT `FK_Id_Prof` FROM `dispenser` WHERE `FK_Id_Classe` is NOT NULL ) ORDER BY `dispenser`.`FK_Id_Classe`,`Nom_Prof` ASC ");
  $req3->execute();
  $data3 = $req3->fetchAll();

  $req4=$con->prepare("SELECT * FROM `etudiant`  WHERE `FK_ID_CLASSE` IS NOT NULL GROUP BY  `FK_ID_CLASSE` ORDER BY `Nom_Etud` ASC ");
  $req4->execute();
  $data4 = $req4->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>GO ADMIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  


</head >
<style> 


input, button,select{
  border:none;
  outline: none;
  background: ;
}
select{
  border:none;
  outline: none;
  background: #99CC99 ;
}
input, select{
  display: block;
  width: 250px;
  margin-top: 5px;
  font-size: 13px;
  padding-bottom: 5px;
  font-weight: 600;
  border-bottom: 1px solid rgba(109, 93, 93, 0.4);
  text-align: center;
  font-family: 'Nunito', sans-serif; 
}

button{
  display: block;
  margin: 0 auto;
  width: 200px;
  height: 36px;
  border-radius: 30px;
  color: #000000;
  border: 2px solid #4CAF50;
  font-size: 15px;
  cursor: pointer;
}

.button:hover {
  background-color: #99CC99; /* Green */
  color: white;
}

.submit{
  margin-top: 40px;
  margin-bottom: 30px;
  text-transform: uppercase;
  font-weight: 600;
  font-family: 'Nunito', sans-serif;
  background: -webkit-linear-gradient(left, #003366, #996633);
}

.submit:hover{
  background: -webkit-linear-gradient(left, #996633, #003366);
}

table {
    width: 100%;
    background-color: #6191b2;
    border: 1px;
    min-width: 100%;
    position: relative;
    
}
thead, tfoot{
background-color:#D0E3FA;
border:0px solid #6495ed;
}

th{
font-family:monospace;
border:0px dotted #6495ed;
padding:5px;
background-color:#EFF6FF;
width:25%;
}

td{
font-family:sans-serif;
font-size:100%;
border:0px solid #6495ed;
padding:5px;
text-align:left;
}

caption{
font-family:sans-serif;
}

p{
  font-family: sans-serif;
  color: yellow;
}
  td 
{
    height: 50px; 
    width: 50px;
    text-align: center; 
    vertical-align: middle;
    font-weight: 800;
}
#cssTabl td 
{
    height: 75px; 
    width: 50px;
    text-align: center; 
    vertical-align: middle;
    font-weight: 800;
}


</style>


<body background="images/bg.jpg">
<div class="row" >
<div class="col-md-6"> 
<?php  
 	foreach ($data as $key ) {
	 echo' 
	 <form method="POST" action="pageaffecprof.php">
<div>
   <table id="cssTabl" style="width:100% " >
    <tr>
          <td> <span>Nom</span> </td>
          <td> <input type="text" name="profnom" value="'.$key['Nom_Prof'].'" disabled> </td>

          <td> <span>Prénoms</span> </td>
          <td> <input type="text" name="profprenom" value="'.$key['Prenom_Prof'].'" disabled> </td>

        </tr>

         <tr>

          <td> <span>Classe</span> </td>
          <td> <select name="classe"> 
            <option>L1A</option>
            <option>L1B</option>
            <option>L1C</option>
            <option>L2A</option>
            <option>L2B</option>
            <option>GLSI3</option>
            <option>ASR3</option>
            <option>MTWI3</option>
          </select> </td>
      
         <td colspan="2" style="text-align: center;"> <button class = "button button" type="submit">Affecter salle</button> </td>

        </tr>
        <tr>

          <input type="hidden" name="mat" value="'.$key['Id_Prof'].'" >
        
        </tr>


          
       </table>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  </form>
  '; } ?>

  </div>


  <div class="col-md-6">
   <?php  
  foreach ($data3 as $key ) {
   echo' 
   <form method="POST" action="pageajoutmat.php">
   <div>
   <table id="cssTable" style="width:100% " >
    <tr>
          <td> <span>Nom</span> </td>
          <td> <input type="text" name="profnom" value="'.$key['Nom_Prof'].'" disabled> </td>

          <td> <span>Prénoms</span> </td>
          <td> <input type="text" name="profprenom" value="'.$key['Prenom_Prof'].'" disabled> </td>

        </tr>


        <tr>

          <td> <span>Matière</span> </td>
          <td> <input type="text" name="mat" value="'.$key['LIBELLE_EC'].'" disabled > </td>

        <td>   <span>Classe</span> </td>
        <td>  <input type="text" name="" value="'.$key['Fk_Id_Classe'].'" disabled> </td>
          
        </tr>


         <tr>

          <td> <span>Classe</span> </td>
          <td> <select name="classe"> 
            <option>L1A</option>
            <option>L1B</option>
            <option>L1C</option>
            <option>L2A</option>
            <option>L2B</option>
            <option>GLSI3</option>
            <option>ASR3</option>
            <option>MTWI3</option>
          </select> </td>
      
         <td colspan="2" style="text-align: center;"> <button class = "button button" type="submit">Ajouter des matières</button> </td>

        </tr>


        <tr>

       <input type="hidden" name="classe" value="'.$key['Fk_Id_Classe'].'" > 

        </tr>



        <tr>

          <input type="hidden" name="mat" value="'.$key['Id_Prof'].'" >
        
        </tr>


          
       </table>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  </form>
  '; } ?> 

   </div>
   </div>



 <div class="row" >
<div class="col-md-6"> 

  <?php  
 	foreach ($data2 as $key ) {
	 echo' 
	 <form method="POST" action="pageaffecetud.php">
    <table id="cssTabl" style="width:100% " >
    <tr>
          <td> <span>Nom</span> </td>
          <td> <input type="text" name="nomEtud" value="'.$key['Nom_Etud'].'" disabled> </td>

          <td> <span>Prénoms</span> </td>
          <td> <input type="text" name="prenomEtud" value="'.$key['Prenom_Etud'].'" disabled> </td>

        </tr>

         <tr>

          <td> <span>Classe</span> </td>
          <td> <select name="classe"> 
            <option>L1A</option>
            <option>L1B</option>
            <option>L1C</option>
            <option>L2A</option>
            <option>L2B</option>
            <option>GLSI3</option>
            <option>ASR3</option>
            <option>MTWI3</option>
          </select> </td>
      
         <td colspan="2" style="text-align: center;"> <button class = "button button" type="submit">Affecter une salle </button> </td>

        </tr>
        <tr>

          <input type="hidden" name="mat" value="'.$key['Matricule'].'" >
        
        </tr>


          
       </table>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  </form>
  '; } ?> 

  </div>


  <div class="col-md-6">
  

  <?php  
  foreach ($data4 as $key ) {
   echo' 
   <form method="POST" action="pageaffecetud.php">
    <div class="sub-cont">
        <label>
          <span>Nom</span>
          <input type="text" name="profnom" value="'.$key['Nom_Etud'].'" disabled>

        </label>
        <label>
          <span>Prénoms</span>
          <input type="text" name="profprenom" value="'.$key['Prenom_Etud'].'" disabled>
        </label>
        <label>
          <span>Classe Actuelle</span>
          <input type="text" name="profprenom" value="'.$key['FK_ID_CLASSE'].'" disabled>
        </label>
        <label>
          <span></span>
          <input type="hidden" name="mat" value="'.$key['Matricule'].'" >
        </label>

        <label>
          <span>Classe</span>
           <select name="classe">
            <option>L1A</option>
            <option>L1B</option>
            <option>L1C</option>
            <option>L2A</option>
            <option>L2B</option>
            <option>GLSI3</option>
            <option>ASR3</option>
            <option>MTWI3</option>
          </select>
        </label>

        <button type="submit">Modifier la salle</button>

      </div>
    </div>
  </div>
  <br>
  <br>
  </form>
  '; } ?>

	 </div>
   </div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>
