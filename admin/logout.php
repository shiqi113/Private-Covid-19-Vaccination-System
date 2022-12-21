<?php
include('dbconnect.php');

session_start();

unset($_SESSION["username"]);


$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: ../login.php');
} 
   

?>
