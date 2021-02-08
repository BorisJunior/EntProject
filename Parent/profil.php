<?php
session_start();

    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

    $id=$_SESSION['login'];



 $req10=$con->prepare("SELECT * FROM `parent` WHERE
  `Id_parent`='$id'");
  $req10->execute();
  $dat = $req10->fetchAll();

 $req9=$con->prepare("SELECT * FROM `etudiant` INNER JOIN `parent` ON `etudiant`.`Fk_Id_Parent` = `parent`.`Id_parent`  INNER JOIN `classe` ON `etudiant`.`FK_ID_CLASSE`=`classe`.`ID_CLASSE` WHERE
  `Id_parent`='$id'");
  $req9->execute();
  $datum = $req9->fetchAll();

  $reqsco=$con->prepare("SELECT DISTINCT `Annee_Sco` FROM `notes` INNER JOIN `etudiant` ON `notes`.`Fk_Etud` = `etudiant`.`Matricule`
                                                                  INNER JOIN `parent` ON `etudiant`.`Fk_Id_Parent` = `parent`.`Id_parent`
                                                                  WHERE `Fk_Id_Parent`='$id' ORDER BY `Annee_Sco` ASC ");
  $reqsco->execute();
  $data = $reqsco->fetchAll();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../assets/img/fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Profil
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
</head>

       
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
          <li  class="active ">
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
                    <a href="https://www.facebook.com/ReseauDesAnciensEtudiantsDeLiaiTogo/" target="blank">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://twitter.com/home" target="blank">
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
          <div class="col-md-4">
            <div class="card card-user">
             
 <?php 
              foreach ($datum as $key ){

              $sexe = $key['Sexe'];

              if ($sexe=="Masculin") {
               echo '<div class="image">
                <img src="https://www.wrightslaw.com/images/bs/graduation.family.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="https://quotesyard.com/wp-content/uploads/2018/03/high-school-graduation-quotes-from-parents.png" alt="...">';
              }
              else
                {
               echo '<div class="image">
                <img src="https://images.squarespace-cdn.com/content/v1/5cd5c5dfe666695652a8f294/1562551294844-N9WF04HKQMCMW5S0BOW2/ke17ZwdGBToddI8pDm48kG87Sfbgg29A4BYEDq3OXvgUqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYxCRW4BPu10St3TBAUQYVKcf4OxbJOyh_wHUnyc4kQLQ6SBshRGOku7c30Y_IRDNPta8R2IY5BHMaEj1zOWoDTZ/parnts.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="https://quotesyard.com/wp-content/uploads/2018/03/high-school-graduation-quotes-from-parents.png" alt="...">';
              }
              }
              echo '<h5 class="title">'.$key['Nom'].' '.$key['Prenom'].'</h5>';
              echo '</a>
                  <p class="description">
                    @iai-togo
                  </p>
                </div>
             <p class="description text-center">
                  "Les plus grands de tous les bienfaits sont ceux que nous avons reçus de nos parents, à notre insu ou même contre notre gré. Las parents contraignent leurs enfants, dès leur bas âge, à supporter tout ce qui leur est bon et salutaire ; ils protègent, ils redressent leurs faibles corps avec un soin extrême, malgré leurs cris et leur résistance ; ils leur inculquent, de gré ou de force, les études libérales ; ils les accoutument, souvent malgré eux, à la frugalité, à la pudeur, à toutes les vertus."<br>
                  -Ambroise Rendu
                </p>
              </div>';

                ?>
                <div class="card-footer">
                <hr>
                <div class="button-container">
                  <br>
                  <div></div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profil</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="Imprimer.php">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Institut</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Institut Africain d'Informatique">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" disabled="" placeholder="Nom" value="<?php
                                                foreach ($dat as $key ){ echo $key['Nom'];} ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Prenom</label>
                        <input type="email" class="form-control" disabled="" placeholder="Prenom" value="<?php
                                                foreach ($dat as $key ){ echo $key['Prenom'];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" disabled="" placeholder="Email" value="<?php
                                                foreach ($dat as $key ){ echo $key['Email_Parent'];} ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" disabled="" placeholder="Telephone" value="<?php
                                                foreach ($dat as $key ){ echo $key['Teleph_Parent'];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Etudiant</label>
                        <input type="text" class="form-control" disabled="" placeholder="Tuteur" <?php foreach ($dat as $key ){
                                                    foreach ($datum as $key ){ echo 'value="'.$key['Nom_Etud'].' '.$key['Prenom_Etud'].' / '.$key['Email_Etud'].'"' ; }} ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                         <label>Classe</label>
                        <input type="text" class="form-control" disabled="" placeholder="Date de Naissance" value="<?php
                                                foreach ($datum as $key ){ echo $key['ID_CLASSE'];} ?>">
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Lieu de Naissance</label>
                        <input type="text" class="form-control" disabled="" placeholder="Lieu de Naissance" value="<?php
                                                foreach ($datum as $key ){ echo $key['NIVEAU'];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div  style="text-align: center;" class="col-md-12">
                      <div class="form-group">
                      <label>Votre Matricule</label>
                      <input <?php echo 'value="'.$id.'"'; ?>disabled="">
                      </div>
                    </div>
                    <div style="text-align: center;" class="col-md-12">
                      <div class="form-group">
                        <h5>Imprimer les notes </h5>
                        
                        <select style="width: 300px;" name="an">

                        <?php  
                          foreach ($data as $key) {

                      echo '<option>'.$key['Annee_Sco'].'</option>';
                    }
                     ?>
                     </select>

                      </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                     <button type="submit" class="btn btn-primary btn-round">Imprimer</button>
                    </div>
                  </div>
                </form>
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
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
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