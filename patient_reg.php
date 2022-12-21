<?php
session_start();
include('dbconnect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$ic = $_POST['ic'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$check_patient =" SELECT * FROM patient WHERE username = '$username' OR email ='$email' OR fullname = '$fullname' OR ic = '$ic' OR phone = '$phone'";
$result_username = mysqli_query($con, $check_patient);

$r = mysqli_num_rows($result_username);

//check user exist or not and insert into acc
if($r== 1){
    echo '<script type="text/javascript">'; 
    echo 'alert("User already exists");'; 
    echo 'document.location.href = "patient.php";';
    echo '</script>';

}else{

    $reg= " INSERT INTO patient(username, password,fullname,ic,phone,email,vaccinationStatus) 
    value ('$username' , '$password' , '$fullname' , '$ic' , '$phone' ,'$email','2')";
    mysqli_query($con, $reg);

    echo '<script type="text/javascript">'; 
    echo 'alert("Registration Successful\nYou are enter the following details:\nUsername: '.$username.
                '\nFullname: '.$fullname.'\nIC No: '.$ic.'\nEmail: '.$email.'\nPhone: '.$phone.'");'; 
    echo 'document.location.href = "login.php";';
    echo '</script>'; 
    


   
}

?>