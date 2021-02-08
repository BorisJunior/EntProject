<?php
session_start();

$an=$_POST['an'];


$id=$_SESSION['login'];

require_once('access.php');
$ac = new access();
$con = $ac->connection();


 $req9=$con->prepare("SELECT * FROM `etudiant` WHERE
  `Matricule`='$id'");
  $req9->execute();
  $datum = $req9->fetchAll();

 $req10=$con->prepare("SELECT * FROM `etudiant` WHERE
  `Matricule`='$id'");
  $req10->execute();
  $dat = $req10->fetchAll();




 $req=$con->prepare("SELECT * FROM `etudiant` INNER JOIN `ec` ON `etudiant`.`FK_ID_CLASSE` = `ec`.`FK_ID_CLASSE`
                        INNER JOIN `notes` ON `notes`.`FK_Etud` = `etudiant`.`Matricule`
                                              INNER JOIN `ue` ON `ue`.`ID_UE` = `ec`.`FK_ID_UE`
                        WHERE `Matricule` ='$id'
                        AND `notes`.`FK_Ec`= `ec`.`ID_EC`
                        AND `notes`.`Annee_Sco`= '$an'
                        ORDER BY `ID_UE` ");

$req->execute();

$data = $req->fetchAll();
  


?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../assets/img/fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Notes de Devoir
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css" rel="stylesheet" />
 
  <link href="assets/demo/demo.css" rel="stylesheet" />

   <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
  <link href="css/magnific-popup.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

  <style type="text/css">

    table {
border:3px solid #63c9e0;
border-collapse:collapse;
width:90%;
margin:auto;
}
thead, tfoot {
background-color:#D0E3FA;
background-image:url(sky.jpg);
border:1px solid #63c9e0;
}
tbody {
background-color:#FFFFFF;
border:1px solid #63c9e0;
}
th {
font-family:monospace;
border:1px dotted #63c9e0;
padding:5px;
background-color:#EFF6FF;
width:20%;
}
td {
font-family:sans-serif;
font-size:80%;
border:1px solid #63c9e0;
padding:5px;
text-align:left;
}
caption {
font-family:sans-serif;
}

button  {

}

.button {
 transition-duration: 0.9s;

}

.button:hover {
  background-color: #bf7132;
  color: white;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
}
</style>     
<body data-spy="scroll" data-target=".fixed-top">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
      <br>
      <br>
      <br>
      <br>
      <br>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="Accueil.php">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li >
            <a href="NoteDevoir.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Notes de Devoir</p>
            </a>
            </li>
            <li>
            <a href="NotePartiel.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Notes de Partiel</p>
            </a>
          </li>
          <li>
            <a href="profil.php">
              <i class="nc-icon nc-badge"></i>
              <p>Profil</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
     
    
    <!-- Preloader -->
  <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" >
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class href="Accueil.php" style="height:70px;" ><div>
            <img src="images/logi.png">
          </div></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
           <ul class="navbar-nav ml-auto">
                 <li class="nav-item" >
                    <a class="nav-link page-scroll" style="color: #124d49;"><?php
                                                foreach ($dat as $key ){ echo 'Bienvenue '.$key['Nom_Etud'].' '.$key['Prenom_Etud'];} ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="NoteDevoir.php" style="color: #287399;">Devoirs<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="NotePartiel.php" style="color: #287399;">Partiels<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="Accueil.php" style="color: #287399;">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="logout.php" style="color: #fca103;">Déconnexion</a>
                </li>

            </ul>
            <span class="nav-item social-icons">
                <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/ReseauDesAnciensEtudiantsDeLiaiTogo/">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://twitter.com/home">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

      <div class="content">
        <div class="row">
           <div class="col-md-1"></div>
          <div class="col-md-11">
            <div class="card ">
              <div class="card">
              <div class="card-header">
                <h4 class="card-title">Liste des notes</h4>
              </div>
              <div class="card-body">
                <div id="divName" class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Unité d'Enseignement
                      </th>
                      <th>
                        Matière
                      </th>
                      <th>
                        Coefficient
                      </th>
                      <th>
                        Devoir
                      </th>
                      <th>
                        Partiel
                      </th>
                    </thead>
                    <tbody>
                      
                      <?php  


  foreach ($data as $key ) {
   echo'
   <tr>
         <td>'.$key['LIBELLE_UE'].'</td>
         <td>'.$key['LIBELLE_EC'].'</td>
         <td>'.$key['Coeff'].'</td>
         <td>'.$key['Devoir'].'</td>
         <td>'.$key['Partiel'].'</td>
   </tr>
  '; } ?> 

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer" style="margin-left:370px; 
                                              width:360px;
                                              height:55px;
                                              background-color:#c1e5e6;
                                              font-size: 25px; "> Imprimer vos notes ici <button onclick="imprimer('divName')" class="button button"><i class="nc-icon nc-paper"></i></button>  </div>
            </div>
            </div>
          </div>
        </div>

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;  

   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
   </script>*<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
  
</body>

</html>
