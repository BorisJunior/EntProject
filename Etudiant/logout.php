<?php
session_start();
if (isset($_SESSION['login'])) {
	session_destroy();
 header("location:loginetud.php");
}else{
 header("location:loginetud.php");
}
 ?>