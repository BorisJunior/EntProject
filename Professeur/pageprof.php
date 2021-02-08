<?php
session_start();
$id=$_SESSION['login'];


require_once('access.php');
$ac = new access();
$con = $ac->connection();


 $req9=$con->prepare("SELECT * FROM `professeur` WHERE
  `Id_Prof`='$id'");
  $req9->execute();
  $datum = $req9->fetchAll();


 $req=$con->prepare("SELECT `ec`.`libelle_ec` AS 'matierelib', `ec`.`id_ec` AS 'matiere', `dispenser`.`Fk_Id_Classe` AS 'classe',`dispenser`.`Fk_Id_Prof`,`ec`.`Statut` AS 'Statut' FROM `ec` INNER JOIN `dispenser` ON `ec`.`id_ec` = `dispenser`.`Fk_Id_ec` WHERE `dispenser`.`Fk_Id_Prof`=(SELECT `Id_Prof` FROM `professeur` WHERE `Id_Prof` = '$id') ");

$req->execute();

$data = $req->fetchAll();


 $req2=$con->prepare("SELECT COUNT(*) FROM `etudiant` INNER JOIN `ec` ON `etudiant`.`FK_ID_CLASSE` = `ec`.`FK_ID_CLASSE` INNER JOIN `dispenser` ON `ec`.`ID_EC` = `dispenser`.`Fk_Id_ec` WHERE
  `Fk_Id_Prof`='$id' ");
  $req2->execute();
  $data2 = $req2->fetchAll();

 $req3=$con->prepare("SELECT COUNT(*) FROM `ec` INNER JOIN `dispenser` ON `ec`.`ID_EC` = `dispenser`.`Fk_Id_ec` WHERE
  `Fk_Id_Prof`='$id' ");
  $req3->execute();
  $data3 = $req3->fetchAll();


$reqsco=$con->prepare("SELECT * FROM `anneescolaire`");
  $reqsco->execute();
  $datasco = $reqsco->fetchAll();

 ?> 



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="../assets/img/fovio.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Page Prof</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">


    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/stylas.css" rel="stylesheet">


</head>


<body id="page-top" class="animsition">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

            <div class="container-fluid">

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top" >
    <div class="container">

      <div class="logo float-left"  >
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="pageprof.php" class="scrollto"><img src="img/logi.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Noter</a></li>
          <li><a href="#why-us">Stats</a></li>
          <li><a href="logout.php">Deconnexion</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Bienvenue<br><span><?php
                                                foreach ($datum as $key ){ echo ''.$key['Nom_Prof'].' '.$key['Prenom_Prof'];} ?></span><br>sur votre page offcielle 
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>IAI-Online</h3>
          <p>IAI-Online vous offre la possibilité de procéder à la notation des étudiants ayant composés dans la/les matière(s) vous enseignez en ligne</p>
        </header>
 
        <div id="about" class="row about-container">

                <div class="row about-extra">
          <div class="col-lg-4 wow fadeInUp">
            <img src="img/about-img.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 wow fadeInUp pt-5 pt-lg-0">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Voici les matières que vous dispensez. Dans laquelle voulez-vous noter les étudiants</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Matière enseignée</th>
                                        <th>Année Scolaire</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php  
  foreach ($data as $key ) { 
   echo' 
   <form method="POST" action="inter.php">
                                    <tr>
                                        <td>'.$key['classe'].'
                                        <input type="hidden" name="classe" value="'.$key['classe'].'" ></td>

                                        <td>'.$key['matierelib'].'
                                        <input type="hidden" name="matiere" value="'.$key['matiere'].'">
                                        <input type="hidden" name="matierelib" value="'.$key['matierelib'].'">
                                        <input type="hidden" name="idprof" value="'.$key['Fk_Id_Prof'].'"></td>';

                                        if ($key['Statut'] == 'Actif') {
                                          echo'<td> <select name="annee_sco">
                                                                        <option>Choisir Année Scolaire</option>';
                                                                       
                    foreach ($datasco as $key) {

                      echo '<option>'.$key['Annee_Sco'].'</option>';
                    }
                  

                                                                        echo '</select> </td>

                                        <td><button type="submit"  formtarget="_blank"  class="btn btn-primary">
                                            Noter les étudiants de cette salle</button></td>
                                    </tr>
                                    </form>';
                                         
                                        } else {
                                           echo '<td> <select name="annee_sco">
                                                                        <option>Choisir Année Scolaire</option>';
                                                                       
                    foreach ($datasco as $key) {

                      echo '<option>'.$key['Annee_Sco'].'</option>';
                    }
                  

                                                                        echo '</select> </td>

                                         
                                        <td><button type="submit"  disabled="" class="btn btn-primary">
                                            Notation Vérouillée</button></td>
                                        </tr>
                                        </form>';
                                         


                                        }



} 

?> 

                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            
          </div>
        </div>

          
        </div>


      </div>
    </section><!-- #about -->

   

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Statistiques</h3>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title"> </h5>
                <p class="card-text">Si les décisions que vous prenez pour investir vos efforts acharnés ne sont pas cohérentes avec la personne que vous souhaitez devenir, vous ne deviendrez jamais cette personne. <br>~Clayton M. </p>
                
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                              foreach ($data3 as $key ){ echo $key['COUNT(*)'];} ?></span>
            <p>Nombre de matières dispensées</p>
          </div>

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                              foreach ($data2 as $key ){ echo $key['COUNT(*)'];} ?></span>
            <p>Nombre d'étudiants </p>
          </div>

        </div>

        
      </div>
    </section>
            </div>
        </div>
   
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
     <script src="vendor/animsition/animsition.min.js"></script>
     <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/mainn.js"></script>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>

