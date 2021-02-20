<?php
session_start();
if (isset($_SESSION['login'])) {
	session_destroy();
 header("location:../Login/login.php");
}else{
 header("location:../Login/login.php");
}
 ?>