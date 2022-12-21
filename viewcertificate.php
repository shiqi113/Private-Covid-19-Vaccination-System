<?php
include('dbconnect.php');
$output = '';
$rec_id = $_POST['id'];

$sql = "SELECT * FROM appointment where ic='$rec_id'";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
$patient=$row['patient']; 
$center=$row['centerID'];
$batch=$row['batchNo'];
$status=$row['status'];

?>

<div class="patient-card1">
    <div class="card-background">
        <div class="half-background">
            <div class="head">
                <div>
                    <h2>Patient</h2>
                    <?php 
                        $p = "SELECT * FROM patient WHERE ic='$row[ic]'";
                        $q = mysqli_query($con,$p);
                        $row=mysqli_fetch_array($q);
                        ?>
                        <p>P0000<?php echo $row["patientID"] ?> </p>
                        
                
                </div>
            </div>
        </div>
        <div class="avatar">
            <div class="img">
            <img src="assets/img/patient.png" alt="">
            </div>
            <p><?php echo strtoupper($row["fullname"]) ?></p>
            <p><?php echo $row["ic"] ?></p>

        </div>
        <?
        ?>
        <div class="info1">
        <?php 
            $i = 1;
           
            $cats = $con->query("SELECT * FROM appointment where ic='$rec_id' order by vaccinationID asc");
            while($row=$cats->fetch_assoc()):
        ?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-blue" ><strong>Dose<?php echo $i++ ?></strong></li>
            <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Date: <?php echo $row["date"] ?></li>
            <li class="list-group-item"><i class="fa fa-syringe"></i> Vaccine Name: <?php echo strtoupper($row["vaccineName"]) ?></li>
            <li class="list-group-item"><i class="fa fa-syringe"></i> Batch No: <?php echo $row["batchNo"] ?></li>
            <?php 
                $p = "SELECT * FROM center WHERE centerID='$center'";
                $q = mysqli_query($con,$p);
                $row=mysqli_fetch_array($q);
                ?>
                    <li class="list-group-item"><i class="far fa-hospital"></i> Healthcare centre:&nbsp;<?php echo $row['centername'] ?></li>
                <?php
            ?>

        </ul>
        <?php endwhile; ?>  
        
       
        </div>

    </div>
</div>
    
<?php
  

mysqli_close($con);
?>
