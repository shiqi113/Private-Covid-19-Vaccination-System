<?php

include('dbconnect.php');

$vaccineID= $_GET['vaccineID'];
//split the data and pass into array
$str=explode("-",$vaccineID);
$v_id=$str[0];
$batch=$str[1];
$c_ID=$str[2];
//update appointment status
$u= "UPDATE appointment SET status= 'Confirmed' where vaccinationID='$v_id'";
$update = mysqli_query($con, $u);
if($update){
   

    echo '<script type="text/javascript">'; 
    echo 'alert("Update Successful");';
    echo 'document.location.href = "appointment.php";';
    echo '</script>';

}
mysqli_close($con);
?>
