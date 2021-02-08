 <?php
session_start();

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $login = $_POST['email'];
    $password = $_POST['pass'];
    
    require_once('access.php');
    $ac = new access();
    $con = $ac->connection();

    $req = $con->prepare("SELECT * FROM `gestion` WHERE `Admin` = '$login' AND `Password` = '$password'");
    $req->execute();
    $res = $req->fetch();

     if ($res) {
        $_SESSION['email'] = $login;
        $_SESSION['pass'] = $password;
        header("location: pagadmin.php");
    }

    else {
    	$message = 'Utilisateur ou mot de passe incorrecte !!';
    	echo $message;
    }
}

    