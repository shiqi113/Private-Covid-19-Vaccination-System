<?php
session_start();
include('dbconnect.php');

$patient= $_POST['patient'];
$ic = $_POST['ic'];
$centerID = $_POST['centerID'];
$vaccineName = $_POST['vaccineName'];
$batchNo = $_POST['batchNo'];
$date= $_POST['date'];
$v_ID= $_POST['v_ID'];
$month=date('m', strtotime($_POST['date']));
$check_appointment =" SELECT * FROM appointment WHERE ic = '$ic'";
$result_username = mysqli_query($con, $check_appointment);

$r = mysqli_num_rows($result_username);


if($r== 1){
    echo '<script type="text/javascript">'; 
    echo 'alert("You already make an appointment");'; 
    echo 'document.location.href ="appointment.php";';
    echo '</script>';

}else{
    //insert appintment into database and update the pending appointment,
    $reg= " INSERT INTO appointment(v_ID,patient, ic,date,batchNo,vaccineName,centerID,status,registered_date) 
    value ('$v_ID' ,'$patient' , '$ic' , '$date' , '$batchNo' , '$vaccineName' ,'$centerID','Pending',current_timestamp())";
    mysqli_query($con, $reg);
    
    $p = "SELECT * FROM vaccine WHERE batchNo='$batchNo' AND centerID='$centerID'";
    $q = mysqli_query($con,$p);
    $row=mysqli_fetch_array($q);

    $total_pen=$row['penAppointment'];
    $latest_pen=$total_pen + 1;
    $u_vaccine= "UPDATE vaccine SET penAppointment='$latest_pen' where batchNo='$batchNo' AND centerID='$centerID'";
    $update = mysqli_query($con, $u_vaccine);

    echo '<script type="text/javascript">'; 
    echo 'alert("Book Successful\nYou are enter the following details:\nPatient: '.$patient.
                '\nIC No: '.$ic.'\nAppointment Date: '.$date.'\nBatchNo: '.$batchNo.'");'; 
    echo 'document.location.href = "index.php";';
    echo '</script>'; 
    


   
}

?>