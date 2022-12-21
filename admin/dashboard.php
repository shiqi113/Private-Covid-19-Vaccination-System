<?php 
include('dbconnect.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:../login.php');
}
if(isset($_SESSION['username'])){
    $sql = "SELECT * FROM healcareadmin WHERE username='$_SESSION[username]'";
    $query = mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
    $_SESSION['centerID']=$row["centerID"];
    $centerID=$row["centerID"];


}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="assets/img/logo2.png"  type="image/x-icon"/>
        <meta name="description" content="" />
        <title>PCVS | Dashboard</title> 
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
       

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.html"><img src="assets/img/logo2.png" alt="patient" style="width: 20%;">&nbsp;PCVS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;"><i class="far fa-hospital"></i>&nbsp;<?php echo ($row['center']);?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">                     
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">PAGE</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #fff;"></i></div>
                                <span class="align-middle">Dashboard</span>
                            </a>
                            <a class="nav-link" href="recordVaccine.php">
                                <div class="sb-nav-link-icon"><i class="far fa-clipboard" style="color: #fff;"></i> </div>
                                <span class="align-middle">Record Vaccine</span>
                            </a>
                            <a class="nav-link" href="vaccineBatch.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-syringe" style="color: #fff;"></i></div>
                                <span class="align-middle">Vaccine Batch</span>
                            </a>
                            <a class="nav-link" href="appointment.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-check" style="color: #fff;"></i></div>
                                <span class="align-middle">Appointment</span>
                            </a>
                            <a class="nav-link" href="patientList.php">
                                <div class="sb-nav-link-icon"> <i class="fas fa-users" style="color: #fff;"></i></div>
                                <span class="align-middle">Patient</span>
                            </a>
                        </div>
                    </div>
                  
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Total Patient
                                                <br>
                                                <?php 
                                                    //show total patient in this healthcare center
                                                    $cats = $con->query("SELECT COUNT(DISTINCT patient) AS patient FROM appointment WHERE centerID='$_SESSION[centerID]'");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                    
                                                    <span class="dashboard-content"><?php echo $row['patient']?></span>
                                                <?php endwhile; ?>  
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                            <div class="dashboard-name">
                                                New Appointment
                                                <br>
                                                <?php 
                                                    //show daily appointment in this healthcare center
                                                    $cats = $con->query("SELECT COUNT(vaccinationID) FROM appointment WHERE centerID='$_SESSION[centerID]' AND DATE(registered_date)=DATE(now())");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                    <span class="dashboard-content"><?php echo $row['COUNT(vaccinationID)']?></span>
                                                <?php endwhile; ?>  
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Fully Vaccinated
                                                <br>
                                                <?php 
                                                    //show fully vaccinated total in this center
                                                     $cats = $con->query("SELECT COUNT(DISTINCT patient.username) AS username,appointment.patient,patient.patientID,patient.vaccinationStatus FROM appointment INNER JOIN patient 
                                                                            WHERE appointment.centerID=$centerID AND patient.vaccinationStatus = 0 AND appointment.patient=patient.fullname");
                                 
                                                    while($row=$cats->fetch_assoc()):
                                                ?>

                                                    <span class="dashboard-content"><?php echo $row['username']?></span>
                                                <?php endwhile; ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Partially Vaccinated
                                                <br>
                                                <?php 
                                                    //show partially vaccinated total in this center
                                                    $cats = $con->query("SELECT COUNT(DISTINCT patient.username) AS username, appointment.patient,patient.patientID,patient.vaccinationStatus FROM appointment INNER JOIN patient 
                                                                        WHERE appointment.centerID=$centerID AND patient.vaccinationStatus > 0 AND appointment.patient=patient.fullname");
                                                    
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                    <span class="dashboard-content"><?php echo $row['username']?></span>
                                                <?php endwhile; ?>  
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fa fa-syringe" ></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Total Vaccine
                                                <br>
                                                <?php 
                                                    //show total vaccine in this center
                                                    $cats = $con->query("SELECT SUM(quantity) FROM vaccine WHERE centerID='$_SESSION[centerID]'");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                
                                                    <span class="dashboard-content">
                                                        <?php
                                                            if( $row['SUM(quantity)']== 0){
                                                                echo "No Data" ;
                                                            }else{
                                                                echo $row['SUM(quantity)'];

                                                            }
                                                        ?>
                                                    
                                                <?php endwhile; ?>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="progress-data text-dark">
                                             <?php 
                                                $cats = $con->query("SELECT SUM(quantity),SUM(availableQuantity),SUM(penAppointment),SUM(admAppointment) FROM vaccine WHERE centerID='$_SESSION[centerID]'");
                                                while($row=$cats->fetch_assoc()):
                                                $quantity=$row['SUM(quantity)'];
                                                    
                                            ?>
                                                <?php
                                                    if($quantity==0){
                                                       "";
                                                       //if no relevant vaccine show ""
                                                    }else{
                                                        $pending= $row['SUM(penAppointment)'];
                                                        $administered= $row['SUM(admAppointment)'];
                                                        
                                                        $total_appointment=$pending+$administered;
                                                        $availableQuantity=$quantity-$total_appointment;
                                                        $usedVaccine=$total_appointment/$quantity;
                                                        $percent=$usedVaccine*100;
                                                        ?>
                                                            <div class="data-left">
                                                                <strong ><?php echo number_format($percent,2)."%"?></strong>
                                                            </div>
                                                            <div class="data-right">
                                                                <small >Available Vaccine(<?php echo $availableQuantity."/".$quantity?>)</small>
                                                            </div>

                                                        <?php
                                                    }
                                                ?>
                                                 
                                        </div>
                                        <br>
                                        <?php 
                                            if($quantity==0){
                                             //if no relevant vaccine show ""
                                               "";
                                            }else{
                                                ?>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-progress" role="progressbar" style="width: <?php echo $percent?>%;height: 10px;" aria-valuenow="55.6" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php endwhile; ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fa fa-syringe" ></i>
                                            </div>
                                            <div class="dashboard-name">
                                                AstraZeneca
                                                <br>
                                                <?php 
                                                    $cats = $con->query("SELECT SUM(quantity) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='AstraZeneca'");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                  <span class="dashboard-content">
                                                        <?php
                                                            if( $row['SUM(quantity)']== 0){
                                                                echo "No Data" ;
                                                                 //if no relevant vaccine show ""
                                                            }else{
                                                                echo $row['SUM(quantity)'];

                                                            }
                                                        ?>
                                                    </span>
                                                  
                                                <?php endwhile; ?>  
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="progress-data text-dark">
                                             <?php 
                                                $cats = $con->query("SELECT SUM(quantity),SUM(availableQuantity),SUM(penAppointment),SUM(admAppointment) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='AstraZeneca'");
                                                while($row=$cats->fetch_assoc()):
                                                
                                                $quantity=$row['SUM(quantity)'];
                                                
                                                
                                            ?>
                                                <?php
                                                    if($quantity==0){
                                                    "";
                                                    }else{
                                                        $pending= $row['SUM(penAppointment)'];
                                                        $administered= $row['SUM(admAppointment)'];
                                                        $quantity=$row['SUM(quantity)'];
                                                        $total_appointment=$pending+$administered;
                                                        $availableQuantity=$quantity-$total_appointment;
                                                        $usedVaccine=$total_appointment/$quantity;
                                                        $percent=$usedVaccine*100;
                                                        ?>
                                                        <div class="data-left">
                                                                <strong ><?php echo number_format($percent,2)."%"?></strong>
                                                            </div>
                                                            <div class="data-right">
                                                                <small >Available Vaccine(<?php echo $availableQuantity."/".$quantity?>)</small>
                                                            </div>

                                                        <?php
                                                    }
                                                ?>                                                 
                                        </div>
                                        <br>
                                        <?php 
                                            if($quantity==0){
                                               "";
                                                //if no relevant vaccine show ""
                                            }else{
                                                ?>
                                                     <div class="progress">
                                                        <div class="progress-bar bg-progress" role="progressbar" style="width: <?php echo $percent?>%;height: 10px;" aria-valuenow="55.6" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                       
                                        <?php endwhile; ?> 
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fa fa-syringe" ></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Pfizer
                                                <br>
                                                <?php 
                                                    $cats = $con->query("SELECT SUM(quantity) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='Pfizer'");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                  <span class="dashboard-content">
                                                        <?php
                                                            if( $row['SUM(quantity)']== 0){
                                                                echo "No Data" ;
                                                            }else{
                                                                echo $row['SUM(quantity)'];

                                                            }
                                                        ?>
                                                    </span>
                                                  
                                                <?php endwhile; ?>  
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="progress-data text-dark">
                                             <?php 
                                                $cats = $con->query("SELECT SUM(quantity),SUM(availableQuantity),SUM(penAppointment),SUM(admAppointment) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='Pfizer'");
                                                while($row=$cats->fetch_assoc()):
                                                
                                                $quantity=$row['SUM(quantity)'];
                                                
                                                
                                            ?>
                                                <?php
                                                    if($quantity==0){
                                                    "";
                                                    }else{
                                                        $pending= $row['SUM(penAppointment)'];
                                                        $administered= $row['SUM(admAppointment)'];
                                                        $quantity=$row['SUM(quantity)'];
                                                        $total_appointment=$pending+$administered;
                                                        $availableQuantity=$quantity-$total_appointment;
                                                        $usedVaccine=$total_appointment/$quantity;
                                                        $percent=$usedVaccine*100;
                                                        ?>
                                                        <div class="data-left">
                                                                <strong ><?php echo number_format($percent,2)."%"?></strong>
                                                            </div>
                                                            <div class="data-right">
                                                                <small >Available Vaccine(<?php echo $availableQuantity."/".$quantity?>)</small>
                                                            </div>

                                                        <?php
                                                    }
                                                ?>                                                 
                                        </div>
                                        <br>
                                        <?php 
                                            if($quantity==0){
                                               "";
                                            }else{
                                                ?>
                                                     <div class="progress">
                                                        <div class="progress-bar bg-progress" role="progressbar" style="width: <?php echo $percent?>%;height: 10px;" aria-valuenow="55.6" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                       
                                        <?php endwhile; ?> 
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="top-counter">
                                            <div class="feature-icon bg-icon">
                                                <i class="fa fa-syringe" ></i>
                                            </div>
                                            <div class="dashboard-name">
                                                Sinovac
                                                <br>
                                                <?php 
                                                    $cats = $con->query("SELECT SUM(quantity) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='Sinovac'");
                                                    while($row=$cats->fetch_assoc()):
                                                ?>
                                                  <span class="dashboard-content">
                                                        <?php
                                                            if( $row['SUM(quantity)']== 0){
                                                                echo "No Data" ;
                                                            }else{
                                                                echo $row['SUM(quantity)'];

                                                            }
                                                        ?>
                                                    </span>
                                                  
                                                <?php endwhile; ?>  
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="progress-data text-dark">
                                             <?php 
                                                $cats = $con->query("SELECT SUM(quantity),SUM(availableQuantity),SUM(penAppointment),SUM(admAppointment) FROM vaccine WHERE centerID='$_SESSION[centerID]' AND vaccineName='Sinovac'");
                                                while($row=$cats->fetch_assoc()):
                                                
                                                $quantity=$row['SUM(quantity)'];
                                                
                                                
                                            ?>
                                                <?php
                                                    if($quantity==0){
                                                    "";
                                                    }else{
                                                        $pending= $row['SUM(penAppointment)'];
                                                        $administered= $row['SUM(admAppointment)'];
                                                        $quantity=$row['SUM(quantity)'];
                                                        $total_appointment=$pending+$administered;
                                                        $availableQuantity=$quantity-$total_appointment;
                                                        $usedVaccine=$total_appointment/$quantity;
                                                        $percent=$usedVaccine*100;
                                                        ?>
                                                        <div class="data-left">
                                                                <strong ><?php echo number_format($percent,2)."%"?></strong>
                                                            </div>
                                                            <div class="data-right">
                                                                <small >Available Vaccine(<?php echo $availableQuantity."/".$quantity?>)</small>
                                                            </div>

                                                        <?php
                                                    }
                                                ?>                                                 
                                        </div>
                                        <br>
                                        <?php 
                                            if($quantity==0){
                                               "";
                                            }else{
                                                ?>
                                                     <div class="progress">
                                                        <div class="progress-bar bg-progress" role="progressbar" style="width: <?php echo $percent?>%;height: 10px;" aria-valuenow="55.6" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                       
                                        <?php endwhile; ?> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Vaccine Administered
                                    </div>
                                    <div id="piechart_3d" class="chart"></div>

                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Daily Used Vaccine
                                    </div>
                                    <div id="piechart1_3d" class="chart"></div>

                                </div>
                            </div>
                        </div>
                        
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PCVS 2021</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript"> 
            //total Available vaccine chart
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Vaccine', 'Vaccine Administered'],
                <?php
                $query="SELECT DISTINCT(vaccineName),SUM(admAppointment) FROM vaccine WHERE centerID='$_SESSION[centerID]' GROUP BY vaccineName ";
                $res=mysqli_query($con,$query);
                while($data=mysqli_fetch_array($res)){
                    $vaccine=$data['vaccineName'];
                    $vaccineAdm=$data['SUM(admAppointment)'];
                    ?>  
                    ['<?php echo $vaccine;?>',<?php echo $vaccineAdm;?>], 
                    <?php      
                }
            ?> 
            ]);

            var options = {
                title: 'Vaccine Administered',
                backgroundColor: 'transparent',
                colors: ['#52B69A', '#76C893', '#99D98C'],

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
            }

        </script>                                             
        <script type="text/javascript"> 
            //Daily Vaccine chart
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart1);
            function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Vaccine', 'Daily Used Vaccine'],
                <?php
                $query="SELECT DISTINCT(vaccineName),COUNT(vaccineName) FROM appointment WHERE centerID='$_SESSION[centerID]' AND DATE(usedVaccineDate)=DATE(now()) AND status='Administered' GROUP BY vaccineName ";
                $res=mysqli_query($con,$query);
                while($data=mysqli_fetch_array($res)){
                    $vaccine=$data['vaccineName'];
                    $vaccineTotal=$data['COUNT(vaccineName)'];
                    ?>  
                    ['<?php echo $vaccine;?>',<?php echo $vaccineTotal;?>], 
                    <?php      
                }
            ?> 
            ]);

            var options = {
                title: 'Total Daily Used Vaccine',
                backgroundColor: 'transparent',
                colors: ['#52B69A', '#76C893', '#99D98C'],

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
            chart.draw(data, options);
            }

        </script>  
       
    </body>
</html>
