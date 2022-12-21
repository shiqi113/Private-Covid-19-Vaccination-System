<?php
include('dbconnect.php');
$output = '';
$rec_id = $_POST['id'];

$sql = "SELECT * FROM appointment where vaccinationID=".$rec_id;
$result = mysqli_query($con, $sql);
   while($row = mysqli_fetch_assoc($result)) {
    $patient=$row['patient'];
    $center=$row['centerID'];
    $batch=$row['batchNo'];
   ?>
       <div class="patient-card">
            <div class="card-background">
                <div class="half-background">
                    <div class="head">
                        <div>
                            <h2>Patient</h2>
                            <p>VID-0000<?php echo $row['vaccinationID'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="avatar">
                    <div class="img">
                        <img src="assets/img/patient.png" alt="">
                    </div>
                    <p><?php echo strtoupper($row['patient']) ?></p>
                    <p><?php echo strtoupper($row['ic']) ?></p>

                </div>
                <div class="info">
                    <ul class="list-group list-group-flush">
                       
                        <li class="list-group-item bg-blue" style="text-align:center">Appointment Information</li>
                            <?php 
                                $p = "SELECT * FROM patient WHERE fullname='$patient'";
                                $q = mysqli_query($con,$p);
                                $row=mysqli_fetch_array($q);
                                ?>
                                    <li class="list-group-item"><i class="fas fa-envelope"></i> Email:&nbsp;<?php echo $row['email'] ?></li>
                                <?php
                            
                            ?>
                            <?php 
                                $p = "SELECT * FROM center WHERE centerID='$center'";
                                $q = mysqli_query($con,$p);
                                $row=mysqli_fetch_array($q);
                                ?>
                                    <li class="list-group-item"><i class="far fa-hospital"></i> Healthcare centre:&nbsp;<?php echo $row['centername'] ?></li>
                                <?php
                            
                            ?>
                            <?php 
                                $p = "SELECT * FROM appointment where vaccinationID=".$rec_id;
                                $q = mysqli_query($con,$p);
                                $row=mysqli_fetch_array($q);
                                ?>
                                    <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Appointment Date: <?php echo $row['date'] ?></li>
                                <?php
                            
                            ?>
                            <?php 
                                $p = "SELECT * FROM vaccine WHERE batchNo='$batch' AND centerID='$center'";
                                $q = mysqli_query($con,$p);
                                $row=mysqli_fetch_array($q);
                                ?>
                                    <li class="list-group-item"><i class="fa fa-syringe"></i> Vaccine No:<?php echo $row['vaccineID'] ?></li>
                                    <li class="list-group-item"><i class="fa fa-syringe"></i> Vaccine Name: <?php echo $row['vaccineName'] ?></li>
                                    <li class="list-group-item"><i class="fas fa-globe-europe"></i> Manufacturer: <?php echo $row['manufacturer'] ?></li>
                                    <li class="list-group-item"><i class="fa fa-syringe"></i> Batch No: <?php echo $row['batchNo'] ?></li>
                                    <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Expire Date: <?php echo $row['expireDate'] ?></li>
                                <?php
                            
                            ?>
                       

                    </ul>
                </div>
                
            </div>
        </div>
   <?php
}
mysqli_close($con);
?>
