<?php
session_start();
include('dbconnect.php');

$new_centre = $_POST['new_centre'];
$new_address = $_POST['new_address'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$staffID = $_POST['staffID'];
$centername = $_POST['centername'];
$address = $_POST['address'];
$chk_newCentre=$_POST['chk_newCentre'];
$check_healthcare =" SELECT * FROM center WHERE centername = '$new_centre' OR address = '$new_address' ";
$check_username ="SELECT * FROM  healcareadmin WHERE username='$username' OR email='$email' OR staffID= '$staffID' AND center='$centername'";

$result_healthcare = mysqli_query($con, $check_healthcare);
$result_username = mysqli_query($con, $check_username);

$r = mysqli_num_rows($result_healthcare);
$r1 = mysqli_num_rows($result_username);
//check user exist or not
try {
    if(isset($chk_newCentre)){
        if($r > 0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Center Name or Address Already Exists");'; 
            echo 'document.location.href = "HealthcareAdmin.php";';
            echo '</script>';
        }else{
            $newreg_center= "INSERT INTO center(centername, address) value ('$new_centre' , '$new_address ')";
            mysqli_query($con, $newreg_center);
            $centerID=$con->insert_id;
            $reg= " INSERT INTO  healcareadmin (centerID,center,address,username,password,fullname,email,staffID) 
            value ('$centerID','$new_centre' , '$new_address ' , '$username' , '$password' , '$fullname' , '$email' , '$staffID')";
            mysqli_query($con, $reg);
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Registration Successful\nYou are enter the following details:\nUsername: '.$username.
                        '\nFullname: '.$fullname.'\nEmail: '.$email.'\nStaffID: '.$staffID.
                        '\nHealthcare Center: '.$new_centre.'\nHealthcare Center Address: '.$new_address.'");'; 
            echo 'document.location.href = "login.php";';
            echo '</script>'; 
        }
      
    }else{
        if($r1 > 0 ){
            
            echo '<script type="text/javascript">'; 
            echo 'alert("User Already Exists");'; 
            echo 'document.location.href = "HealthcareAdmin.php";';
            echo '</script>';
        }else{
             $center_ID ="SELECT * FROM center WHERE centername = '$centername'";
            $result = mysqli_query($con,$center_ID);
            $row=mysqli_fetch_array($result);
            $centerID=$row['centerID'];
            $reg= " INSERT INTO healcareadmin (centerID,center,address,username,password,fullname,email,staffID) 
            value ('$centerID','$centername' , '$address ' , '$username' , '$password' , '$fullname' , '$email' , '$staffID')";
            mysqli_query($con, $reg);
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Registration Successful\nYou are enter the following details:\nUsername: '.$username.
                        '\nFullname: '.$fullname.'\nEmail: '.$email.'\nStaffID: '.$staffID.
                        '\nHealthcare Center: '.$centername.'\nHealthcare Center Address: '.$address.'");'; 
            echo 'document.location.href = "login.php";';
            echo '</script>'; 

        }
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



?>