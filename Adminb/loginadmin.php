<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bienvenue Cher Administrateur</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styadmin.css">
  
</head>
<body>
  <form method="POST" action="traitementadmin.php">
  <div class="cont">
    <div class="form sign-in">
      <h2>Se Connecter</h2>
      <label>
        <span>Adresse Email</span>
        <input type="email" name="email">
      </label>
      <label>
        <span>Mot de passe</span>
        <input type="password" name="pass">
      </label>
      <button class="submit" type="submit"> Se Connecter</button>
      <p class="forgot-pass">Mot de passe oublié ?</p>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>
    </form>
    <form method="POST" action="traitementsignup.php">
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Bienvenue Cher Administrateur</h2>
          <p>Les gens qui sont assez fous pour penser qu'ils peuvent changer le monde sont ceux qui le font. <br> -Steve Jobs</p>
        </div>
        <div class="img-text m-in">
          <h2></h2>
          <p></p>
        </div>
        
      </div>
      
    </div>
  </div>
  </form>
<script type="text/javascript" src="script.js"></script>
</body>
</html>

