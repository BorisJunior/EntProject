<?php
session_start();
if (isset($_SESSION['login'])) {
	session_destroy();
 header("location:../Login/loginetud.php");
}else{
 header("location:../Login/loginetud.php");
}
 ?>