<?php
session_start();
if (isset($_SESSION['login'])) {
	session_destroy();
 header("location:../Login/LoginProf.php");
}else{
 header("location:../Login/LoginProf.php");
}
 ?>