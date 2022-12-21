<?php
include('dbconnect.php');
$output = '';
$rec_id = $_POST['id'];

$sql = "SELECT  DISTINCT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID ASC";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
//result =1 mean just one data in this table then display the appointment information.
if(mysqli_num_rows($result) == 1){
    $patient=$row['patient']; 
    $center=$row['centerID'];
    $batch=$row['batchNo'];
    $status=$row['status'];
    //Display information base on status
    if($status =="Pending"){
        ?>
            <div class="container">
                <small>Name</small>
                <h5><?php echo (strtoupper($row['patient']));?></h5>
                <small>IC/ Passport No</small>
                <h5><?php echo $row["ic"] ?></h5>
                <div id="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                        </div>
                        <div class="timeline-content">
                            <h3>Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                            <p style="margin-top: 10px;">
                                <?php
                                if( $row['status'] == "Pending"){
                                    ?>
                                        <strong>Status:</strong> <span class="badge bg-secondary"><?php echo $row["status"] ?></span><br>
                                    <?php
                                }
                                else if($row['status'] == "Confirmed"){
                                    ?>
                                        <strong>Status:</strong> <span class="badge bg-warning"><?php echo $row["status"] ?></span><br>
                                    <?php
                                }
                                else if($row['status'] == "Administered"){
                                    ?>
                                        <strong>Status:</strong> <span class="badge bg-success"><?php echo $row["status"] ?></span><br>
                                    <?php
                                }
                                else{
                                    ?>
                                        <strong>Status:</strong> <span class="badge bg-danger"><?php echo $row["status"] ?></span><br>
                                    <?php
                                }
                            ?>
                                <strong>Vaccination ID:</strong>VID-0000<?php echo $row["vaccinationID"] ?><br>
                                <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                                <strong>Date:</strong> <?php echo $row["date"] ?><br>
                            </p>
                        </div>
                    </div>
                </div>
              
            </div>
       <?php

    }
    else if($status =="Rejected"){
        ?>
    
        <div class="container">
           <small>Name</small>
           <h5><?php echo (strtoupper($row['patient']));?></h5>
           <small>IC/ Passport No</small>
           <h5><?php echo $row["ic"] ?></h5>
           <div id="timeline">
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content">
                       <h3>Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                       <p style="margin-top: 10px;">
                           <?php
                           if( $row['status'] == "Pending"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-secondary"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Confirmed"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-warning"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Administered"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-success"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else{
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-danger"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                       ?>
                            <strong>Remark:</strong> <?php echo strtoupper($row["remark"]) ?><br>
                       </p>
                   </div>
               </div>
       
                  
       <?php
        

    }
    else if($status =="Confirmed"){
        ?>
    
        <div class="container">
           <small>Name</small>
           <h5><?php echo (strtoupper($row['patient']));?></h5>
           <small>IC/ Passport No</small>
           <h5><?php echo $row["ic"] ?></h5>
           <div id="timeline">
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content">
                       <h3>Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                       <p style="margin-top: 10px;">
                           <?php
                           if( $row['status'] == "Pending"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-secondary"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Confirmed"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-warning"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Administered"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-success"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else{
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-danger"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                       ?>
                           <strong>Vaccination ID:</strong>VID-0000<?php echo $row["vaccinationID"] ?><br>
                           <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                           <strong>Date:</strong> <?php echo $row["date"] ?><br>
                       </p>
                   </div>
               </div>
       
                   <div class="timeline-item">
                       <div class="timeline-icon">
                       </div>
                       <div class="timeline-content right">
                           <h3>Eligible for vaccine?<br><small style="font-size: 14px;"></small>
                           </h3>
                       </div>
                   </div>
       
                   <div class="timeline-item">
                       <div class="timeline-icon">
                       </div>
                       <div class="timeline-content">
                           <h3>1st Dose Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                           </h3>
                           <p style="margin-top: 10px;">
                               <?php 
                                   $p = "SELECT * FROM center WHERE centerID='$center'";
                                   $q = mysqli_query($con,$p);
                                   $row=mysqli_fetch_array($q);
                                   ?>
                                       <b style="font-weight: bold;">Health Facility:</b> <?php echo $row["centername"] ?><br>
                                       <b style="font-weight: bold;">Vaccination Location:</b> <?php echo $row["address"] ?><br>
                                   <?php
                                   
                               ?>
                                   <?php 
                                   $p = "SELECT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID ASC";
                                   $q = mysqli_query($con,$p);
                                   $row=mysqli_fetch_array($q);
                                   ?>
                                       
                                       <b style="font-weight: bold;">Date:</b> <?php echo $row["date"] ?><br>
                                   <?php
                                   
                               ?>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       <?php
        

    }
    else{
        ?>
    
        <div class="container">
           <small>Name</small>
           <h5><?php echo (strtoupper($row['patient']));?></h5>
           <small>IC/ Passport No</small>
           <h5><?php echo $row["ic"] ?></h5>
           <div id="timeline">
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content">
                       <h3>Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                       <p style="margin-top: 10px;">
                           <?php
                           if( $row['status'] == "Pending"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-secondary"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Confirmed"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-warning"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else if($row['status'] == "Administered"){
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-success"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                           else{
                               ?>
                                   <strong>Status:</strong> <span class="badge bg-danger"><?php echo $row["status"] ?></span><br>
                               <?php
                           }
                       ?>
                           <strong>Vaccination ID:</strong>VID-0000<?php echo $row["vaccinationID"] ?><br>
                           <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                           <strong>Date:</strong> <?php echo $row["date"] ?><br>
                       </p>
                   </div>
               </div>
       
                   <div class="timeline-item">
                       <div class="timeline-icon">
                       </div>
                       <div class="timeline-content right">
                           <h3>Eligible for vaccine?<br><small style="font-size: 14px;"></small>
                           </h3>
                       </div>
                   </div>
       
                   <div class="timeline-item">
                       <div class="timeline-icon">
                       </div>
                       <div class="timeline-content">
                           <h3>1st Dose Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                           </h3>
                           <p style="margin-top: 10px;">
                               <?php 
                                   $p = "SELECT * FROM center WHERE centerID='$center'";
                                   $q = mysqli_query($con,$p);
                                   $row=mysqli_fetch_array($q);
                                   ?>
                                       <b style="font-weight: bold;">Health Facility:</b> <?php echo $row["centername"] ?><br>
                                       <b style="font-weight: bold;">Vaccination Location:</b> <?php echo $row["address"] ?><br>
                                   <?php
                                   
                               ?>
                                   <?php 
                                   $p = "SELECT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID ASC";
                                   $q = mysqli_query($con,$p);
                                   $row=mysqli_fetch_array($q);
                                   ?>
                                       
                                       <b style="font-weight: bold;">Date:</b> <?php echo $row["date"] ?><br>
                                   <?php
                                   
                               ?>
                           </p>
                       </div>
                   </div>
       
                   <div class="timeline-item">
                       <div class="timeline-icon">
                       </div>
                       <div class="timeline-content right">
                           <h3>
                               1st Dose Completed<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                           </h3>
                           <p style="margin-top: 10px;">
                               <strong>Date:</strong> <?php echo $row["date"] ?><br>
                               <strong>Vaccination ID:</strong> VID-0000<?php echo $row["vaccinationID"] ?><br>
                               <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                               <?php 
                                   $p = "SELECT * FROM vaccine WHERE batchNo='$batch' AND centerID='$center'";
                                   $q = mysqli_query($con,$p);
                                   $row=mysqli_fetch_array($q);
                                   ?>
                                       <strong>Expire Date:</strong> <?php echo $row["expireDate"] ?><br>
       
                                   <?php
                               
                               ?>
                           </p>
                       </div>
                   </div>
       
                 
               </div>
           </div>
       
       
       <?php

    }
  
   
}if(mysqli_num_rows($result) == 2){
    $patient=$row['patient']; 
    $center=$row['centerID'];
    $batch=$row['batchNo'];
    $status=$row['status'];
    ?>
    
    <div class="container">
       <small>Name</small>
       <h5><?php echo (strtoupper($row['patient']));?></h5>
       <small>IC/ Passport No</small>
       <h5><?php echo $row["ic"] ?></h5>
       <div id="timeline">
           <div class="timeline-item">
               <div class="timeline-icon">
               </div>
               <div class="timeline-content">
                   <h3>Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                   <p style="margin-top: 10px;">
                       <?php
                       if( $row['status'] == "Pending"){
                           ?>
                               <strong>Status:</strong> <span class="badge bg-secondary"><?php echo $row["status"] ?></span><br>
                           <?php
                       }
                       else if($row['status'] == "Confirmed"){
                           ?>
                               <strong>Status:</strong> <span class="badge bg-warning"><?php echo $row["status"] ?></span><br>
                           <?php
                       }
                       else if($row['status'] == "Administered"){
                           ?>
                               <strong>Status:</strong> <span class="badge bg-success"><?php echo $row["status"] ?></span><br>
                           <?php
                       }
                       else{
                           ?>
                               <strong>Status:</strong> <span class="badge bg-danger"><?php echo $row["status"] ?></span><br>
                           <?php
                       }
                   ?>
                       <strong>Vaccination ID:</strong>VID-0000<?php echo $row["vaccinationID"] ?><br>
                       <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                       <strong>Date:</strong> <?php echo $row["date"] ?><br>
                   </p>
               </div>
           </div>
   
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content right">
                       <h3>Eligible for vaccine?<br><small style="font-size: 14px;"></small>
                       </h3>
                   </div>
               </div>
   
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content">
                       <h3>1st Dose Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                       </h3>
                       <p style="margin-top: 10px;">
                           <?php 
                               $p = "SELECT * FROM center WHERE centerID='$center'";
                               $q = mysqli_query($con,$p);
                               $row=mysqli_fetch_array($q);
                               ?>
                                   <b style="font-weight: bold;">Health Facility:</b> <?php echo $row["centername"] ?><br>
                                   <b style="font-weight: bold;">Vaccination Location:</b> <?php echo $row["address"] ?><br>
                               <?php
                               
                           ?>
                               <?php 
                               $p = "SELECT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID ASC";
                               $q = mysqli_query($con,$p);
                               $row=mysqli_fetch_array($q);
                               ?>
                                   
                                   <b style="font-weight: bold;">Date:</b> <?php echo $row["date"] ?><br>
                               <?php
                               
                           ?>
                       </p>
                   </div>
               </div>
   
               <div class="timeline-item">
                   <div class="timeline-icon">
                   </div>
                   <div class="timeline-content right">
                       <h3>
                           1st Dose Completed<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                       </h3>
                       <p style="margin-top: 10px;">
                           <strong>Date:</strong> <?php echo $row["date"] ?><br>
                           <strong>Vaccination ID:</strong> VID-0000<?php echo $row["vaccinationID"] ?><br>
                           <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                           <?php 
                               $p = "SELECT * FROM vaccine WHERE batchNo='$batch' AND centerID='$center'";
                               $q = mysqli_query($con,$p);
                               $row=mysqli_fetch_array($q);
                               ?>
                                   <strong>Expire Date:</strong> <?php echo $row["expireDate"] ?><br>
   
                               <?php
                           
                           ?>
                       </p>
                   </div>
               </div>
                <?php 
                    $sql = "SELECT  DISTINCT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID DESC";
                    $result = mysqli_query($con, $sql);
                    $row=mysqli_fetch_array($result);
                    $patient=$row['patient']; 
                    $center=$row['centerID'];
                    $batch=$row['batchNo'];
                    $status=$row['status'];
                    
                    if($status =="Confirmed"){
                        ?>
                          <div class="timeline-item">
                            <div class="timeline-icon">
                            </div>
                            <div class="timeline-content">
                                <h3>2st Dose Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small>
                                </h3>
                                <p style="margin-top: 10px;">
                                    <?php 
                                        $p = "SELECT * FROM center WHERE centerID='$center'";
                                        $q = mysqli_query($con,$p);
                                        $row=mysqli_fetch_array($q);
                                        ?>
                                            <b style="font-weight: bold;">Health Facility:</b> <?php echo $row["centername"] ?><br>
                                            <b style="font-weight: bold;">Vaccination Location:</b> <?php echo $row["address"] ?><br>
                                        <?php
                                        
                                    ?>
                                        <?php 
                                        $p = "SELECT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID DESC";
                                        $q = mysqli_query($con,$p);
                                        $row=mysqli_fetch_array($q);
                                        ?>
                                            
                                            <b style="font-weight: bold;">Date:</b> <?php echo $row["date"] ?><br>
                                        <?php
                                        
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                             <div class="timeline-item">
                                <div class="timeline-icon">
                                </div>
                                <div class="timeline-content">
                                <?php 
                                        $sql = "SELECT DISTINCT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID DESC";
                                        $result = mysqli_query($con, $sql);
                                        $row=mysqli_fetch_array($result);
                                        ?>
                                             <h3>2st Dose Appointment<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                                            <p style="margin-top: 10px;">
                                                <?php 
                                                    $p = "SELECT * FROM center WHERE centerID='$center'";
                                                    $q = mysqli_query($con,$p);
                                                    $row=mysqli_fetch_array($q);
                                                    ?>
                                                        <b style="font-weight: bold;">Health Facility:</b> <?php echo $row["centername"] ?><br>
                                                        <b style="font-weight: bold;">Vaccination Location:</b> <?php echo $row["address"] ?><br>
                                                    <?php
                                                    
                                                ?>
                                                    <?php 
                                                    $p = "SELECT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID ASC";
                                                    $q = mysqli_query($con,$p);
                                                    $row=mysqli_fetch_array($q);
                                                    ?>
                                                        
                                                        <b style="font-weight: bold;">Date:</b> <?php echo $row["date"] ?><br>
                                                    <?php
                                                    
                                                ?>
                                            </p>
                                        <?php
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                </div>
                                <div class="timeline-content right">
                                    <?php 
                                        $sql = "SELECT DISTINCT * FROM appointment where ic='$rec_id' ORDER BY vaccinationID DESC";
                                        $result = mysqli_query($con, $sql);
                                        $row=mysqli_fetch_array($result);
                                        ?>
                                            <h3 style="font-size: 20px;">2st Dose Completed<br><small style="font-size: 14px;">[<?php echo $row["date"] ?>]</small></h3>
                                
                                            <p style="margin-top: 10px;">
                                                <strong>Date:</strong> <?php echo $row["date"] ?><br>
                                                <strong>Vaccine Number:</strong> VID-0000<?php echo $row["vaccinationID"] ?><br>
                                                <strong>Batch No:</strong> <?php echo $row["batchNo"] ?><br>
                                                <?php 
                                                    $p = "SELECT * FROM vaccine WHERE batchNo='$batch' AND centerID='$center'";
                                                    $q = mysqli_query($con,$p);
                                                    $row=mysqli_fetch_array($q);
                                                    ?>
                                                        <strong>Expire Date:</strong> <?php echo $row["expireDate"] ?><br>
            
                                                    <?php
                                                
                                                ?>
            
                                            </p>
                                        <?php
                                    ?>
                                </div>
                            </div>                       
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                </div>
                                <div class="timeline-content">
                                    <h3>Digital Certificate Issued</h3>
                                </div>
                            </div>
                        <?php
                    }
                   
                ?>      
           </div>
       </div>
   <?php
}

else if(mysqli_num_rows($result) <= 0){
    echo "No appointment";
}

mysqli_close($con);
?>