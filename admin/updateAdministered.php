<?php

include('dbconnect.php');
$vaccinationID= $_POST['vaccinationID'];
$remarks= $_POST['remarks'];
$batchNo= $_POST['batchNo'];
$centerID= $_POST['centerID'];
$patient= $_POST['patient'];
$ic= $_POST['ic'];
$vaccineName= $_POST['vaccineName'];
$date= $_POST['date'];
$new_date = date('Y-m-d', strtotime($date . ' +14 day'));

//update current appointment status
$u= "UPDATE appointment SET status='Administered',remark='$remarks', usedVaccineDate=now() where vaccinationID='$vaccinationID'";
$update_appointment = mysqli_query($con, $u);

if($update_appointment){
    //update the availble vaccine quantity and the appointment
    $p1 = "SELECT * FROM vaccine WHERE batchNo='$batchNo' AND centerID='$centerID'";
    $q1 = mysqli_query($con,$p1);
    $row=mysqli_fetch_array($q1);
    $qty_vaccine=$row['availableQuantity'];
    $latest_vaccine=$qty_vaccine - 1;
    $total_adm=$row['admAppointment'];
    $total_pen=$row['penAppointment'];
    $latest_adm=$total_adm + 1;
    $latest_pen=$total_pen - 1;

    $u_vaccine= "UPDATE vaccine SET availableQuantity='$latest_vaccine',admAppointment='$latest_adm',penAppointment='$latest_pen' where batchNo='$batchNo' AND centerID='$centerID'";
    $update_vaccine = mysqli_query($con, $u_vaccine);

    //get vaccine status
    $get_status = "SELECT * FROM patient WHERE fullname='$patient' AND ic='$ic'";
    $status_result = mysqli_query($con, $get_status);
    $row=mysqli_fetch_array($status_result);
    $status=$row['vaccinationStatus'];
    $latest_status=$status-1;
    //if status<=0 mean patient fully vaccinated no need assign new appointment
    $u_vaccineStatus= "UPDATE patient SET vaccinationStatus='$latest_status' where fullname='$patient' AND ic='$ic'";
    $update_appointment = mysqli_query($con, $u_vaccineStatus);

}

//get latest status
$get_status = "SELECT * FROM patient WHERE fullname='$patient' AND ic='$ic'";
$status_result = mysqli_query($con, $get_status);
$row=mysqli_fetch_array($status_result);
$status=$row['vaccinationStatus'];
if($status>0){
    //assign new batch for next appointment
    $get_vaccineID = "SELECT * FROM vaccine WHERE batchNo='$batchNo' AND centerID='$centerID'";
    $get_result = mysqli_query($con, $get_vaccineID);
    $row=mysqli_fetch_array($get_result);
    $vaccineID=$row['vaccineID'];
    $sql = "SELECT batchNo,ID FROM vaccine WHERE vaccineID='$vaccineID' AND centerID='$centerID' AND availableQuantity > 1 ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    $random_batchNo=$row['batchNo'];
    $random_batchid=$row['ID'];

    //insert new appointment
    $reg= " INSERT INTO appointment(v_ID,patient, ic,date,batchNo,vaccineName,centerID,status,registered_date) 
        value ('$random_batchid' ,'$patient' , '$ic' , '$new_date ' , '$random_batchNo' , '$vaccineName' ,'$centerID','Confirmed',current_timestamp())";
        mysqli_query($con, $reg);
    //update new pending appointment total
    $p = "SELECT * FROM vaccine WHERE batchNo='$batchNo' AND centerID='$centerID'";
    $q = mysqli_query($con,$p);
    $row=mysqli_fetch_array($q);
    $total_pen=$row['penAppointment'];
    $latest_pen=$total_pen + 1;
    $u_pending= "UPDATE vaccine SET penAppointment='$latest_pen' where batchNo='$random_batchNo' AND centerID='$centerID'";
    $update_pending = mysqli_query($con, $u_pending);
    

}
echo '<script type="text/javascript">'; 
echo 'alert("Update Successful");';
echo 'document.location.href = "appointment.php";';
echo '</script>';


?>
