<?php
session_start();



$_SESSION['classe']=$_POST['classe'];

$id=$_SESSION['login'];

header("location: listetud.php");

?>