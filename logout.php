<?php
include('dbconnect.php');

session_start();

unset($_SESSION["username"]);
//unset the username and go back to th index page.

$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: index.php');
} 
   

?>
