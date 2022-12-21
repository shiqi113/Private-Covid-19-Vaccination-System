<?php
session_start();
include('dbconnect.php');


$vaccineID= $_POST['vaccineID'];
$vaccineName = $_POST['vaccineName'];
$manufacturer = $_POST['manufacturer'];
$batchNo = $_POST['batchNo'];
$expireDate= $_POST['expireDate'];
$quantity = $_POST['quantity'];
$centerID = $_POST['centerID'];


$b =" SELECT * FROM vaccine WHERE batchNo = '$batchNo' AND centerID='$centerID'";
$result = mysqli_query($con, $b);
$check_b = mysqli_num_rows($result);

if($check_b == 1){
    //chekk vaccine exist or not in this center
    echo '<script type="text/javascript">'; 
    echo 'alert("Batch No Already Exists.");'; 
    echo 'document.location.href = "recordVaccine.php";';
    echo '</script>';
}
else{
    $reg= " INSERT INTO vaccine(vaccineID,vaccineName,manufacturer,batchNo,expireDate,quantity,	availableQuantity,centerID) 
    value ('$vaccineID' , '$vaccineName','$manufacturer' , '$batchNo' , '$expireDate' , '$quantity', '$quantity',$centerID)";
    mysqli_query($con, $reg);
    echo '<script type="text/javascript">'; 
    echo 'alert("Record Successful");'; 
    echo 'document.location.href = "VaccineBatch.php";';
    echo '</script>';
   
}
?>