<?php
session_start();
include('dbconnect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$accType = $_POST['accType'];

$p =" select * from patient where  username = '$username' && password = '$password'";
$a =" select * from healcareadmin where  username = '$username' && password = '$password'";
$result = mysqli_query($con, $p);
$result1 = mysqli_query($con, $a);
$check_p = mysqli_num_rows($result);
$check_a = mysqli_num_rows($result1);

//check the username and password correct or not
if($accType == "HealthcareAdmin"){
    if($check_a == 1){
        $_SESSION['username'] = $username;
        header('location:../PCVS/admin/dashboard.php');
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Invalid password or username and acount type.");'; 
        echo 'document.location.href = "login.php";';
        echo '</script>';
        
    }
}else{
    if($check_p == 1){
        $_SESSION['username'] = $username;
        header('location:appointment.php');
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Invalid password or username and acount type.");'; 
        echo 'document.location.href = "login.php";';
        echo '</script>';
        
    }
}

?>