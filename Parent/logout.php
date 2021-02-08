<?php
session_start();
if (isset($_SESSION['login'])) {
	session_destroy();
 header("location:loginparent.php");
}else{
 header("location:loginparent.php");
}
 ?>