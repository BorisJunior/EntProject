<?php
session_start();

$id=$_SESSION['login'];


    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

  
 $req4=$con->prepare("SELECT DISTINCT `Id_Prof`,`Nom_Prof`,`Prenom_Prof`,`ec`.`FK_ID_CLASSE` FROM `professeur` INNER JOIN `dispenser` ON  `Id_Prof` = `FK_Id_Prof` WHERE `Id_Prof` IN (SELECT `FK_Id_Prof` FROM `dispenser` WHERE `FK_Id_Classe` is NOT NULL ) ORDER BY `Nom_Prof` ASC ");
  $req4->execute();
  $data4 = $req4->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
 <head>
 <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../assets/img/adm.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Professeurs
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />



   
    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class href="pageadmin.php" style="height:70px;" ><div style="background-color: white;">
            <img src="images/logi.png">
          </div></a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="pageadmin.php">
              <i class="now-ui-icons design_app"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li class="active ">
            <a href="Professeurs.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Professeurs</p>
            </a>
          </li>
          <li>
            <a href="Etudiants.php">
              <i class="now-ui-icons education_hat"></i>
              <p>Etudiants</p>
            </a>
          </li>
          <li>
            <a href="Tuteurs.php">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Parents d'élève</p>
            </a>
          </li>
          <li>
            <a href="">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>...</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">Admin Side</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
               <li class="nav-item dropdown">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  <i class="nc-user-run"></i>
                  <p>Deconnnexion
                    <span class="d-lg-none d-md-block">Deconnnexion</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div style="height: 10px;" class="panel-header panel-header-lg">

      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="dropdown">
  <button class="" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 455px">
    Autres Actions à Effectuer
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  style="margin-left: 455px">
    <a class="dropdown-item" href="Professeurs.php">Liste des professeurs</a>
    <a class="dropdown-item" href="miseprof.php">Mise en place de professeurs sur la plateforme</a>
    <a class="dropdown-item" href="supprof.php">Supprimer compte professeur</a>
    
  </div>
</div>
                <h4 class="card-title">Liste des professeurs</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prenoms
                      </th>
                      <th>
                        Prenoms
                      </th>
                    </thead>
                    <tbody>
                      <?php  
  foreach ($data as $key ) {
    if ($id) {
   echo' 
   <form method="POST" action="voirmatiere.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$key['Id_Prof'].'" disabled >
                                                    <input type="hidden" name="id" value="'.$key['Id_Prof'].'"></td>

                                                <td><input type="text" name="" value="'.$key['Nom_Prof'].'" disabled>
                                                    <input type="hidden" name="profnom" value="'.$key['Nom_Prof'].'"> </td>

                                                <td><input type="text" name="" value="'.$key['Prenom_Prof'].'" disabled>
                                                    <input type="hidden" name="profprenom" value="'.$key['Prenom_Prof'].'"> </td>
                                                

                                                <td class="text-right"> <button type="submit" target="blank" class="btn btn-primary">Voir Matieres</button> </td>
        
                                                </tr>

  </form>
  ';}}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



          
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>

   
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
    <script src="js/main.js"></script>



</body>

</html>