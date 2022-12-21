<?php

include('dbconnect.php');
$vaccinationID= $_POST['vaccinationID'];
$remarks= $_POST['remarks'];
$centerID= $_POST['centerID'];
$batchNo= $_POST['batchNo'];

$u= "UPDATE appointment SET status='Rejected',remark='$remarks' where vaccinationID='$vaccinationID'";
$update = mysqli_query($con, $u);
if($update){
    //update the pending appointment total
    $p = "SELECT * FROM vaccine WHERE batchNo='$batchNo' AND centerID='$centerID'";
    $q = mysqli_query($con,$p);
    $row=mysqli_fetch_array($q);

    $total_pen=$row['penAppointment'];
    $latest_pen=$total_pen - 1;
    $u_vaccine= "UPDATE vaccine SET penAppointment='$latest_pen' where batchNo='$batchNo' AND centerID='$centerID'";
    $updatevaccine = mysqli_query($con, $u_vaccine);
    echo '<script type="text/javascript">'; 
    echo 'alert("Update Successful");';
    echo 'document.location.href = "appointment.php";';
    echo '</script>';

}
?>
