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
        <title>PCVS | Appointment</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" >

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><img src="assets/img/logo2.png" alt="patient" style="width: 20%;">&nbsp;PCVS</a>
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
                        <h1 class="mt-4">Appointment List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="viewVaccineBatch.html">Appointment</a></li>
                            <li class="breadcrumb-item active">Appointment List</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-list"></i>
                                Appointment  List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="batchtable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>VaccinationID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="action1-th">Action</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody style="text-align: center;" >

                                        <?php 
                                            $i = 1;
                                            $centerID=$row["centerID"];
                                            $cats = $con->query("SELECT * FROM appointment where centerID=$centerID order by vaccinationID DESC");
                                            while($row=$cats->fetch_assoc()):
                                        ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td>
                                                    VID-0000<?php echo $row['vaccinationID'] ?>
                                                </td>

                                                <td>
                                                    <?php echo strtoupper($row['date']) ?>
                                                </td>

                                                <td>
                                                     <?php
                                                        if( $row['status'] == "Pending"){
                                                            ?>
                                                                <span class="badge bg-secondary" id="v-status"><?php echo $row['status']?></span>
                                                            <?php
                                                        }
                                                        else if($row['status'] == "Confirmed"){
                                                            ?>
                                                                <span class="badge bg-warning" id="v-status"><?php echo $row['status']?></span>
                                                            <?php
                                                        }
                                                        else if($row['status'] == "Administered"){
                                                            ?>
                                                                <span class="badge bg-success" id="v-status"><?php echo $row['status']?></span>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <span class="badge bg-danger" id="v-status"><?php echo $row['status']?></span>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td >
                                                    <?php
                                                     if( $row['status'] == "Pending"){
                                                         ?>
                                                            <button class="btn-batchview get_id" data-bs-toggle="modal" data-bs-target="#modalpatient"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="far fa-eye"></i></button>
                                                            
                                                            <a href="confirm.php?vaccineID=<?php echo $row['vaccinationID']."-".$row['batchNo']."-".$row['centerID']; ?>">
                                                                <button class="btn-batchview"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                            </a>
                                                           
                                                            <button class="btn-batchview" disabled><i class="fa fa-list-alt" aria-hidden="true"></i></button>
                                                            
                                                            <button class="btn-batchview get_reject" data-bs-toggle="modal" data-bs-target="#modalForm"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="fa fa-times" aria-hidden="true"></i></button>                                                    
                                                           
                                                        <?php
                                                    }
                                                    else if($row['status'] == "Confirmed"){
                                                        ?>
                                                            <button class="btn-batchview get_id" data-bs-toggle="modal" data-bs-target="#modalpatient"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="far fa-eye"></i></button>
                                                            <button class="btn-batchview-active" disabled><i class="fa fa-check" aria-hidden="true"></i></button>
                                                            <button class="btn-batchview get_administered"  data-bs-toggle="modal" data-bs-target="#modalAdministered" data-id='<?php echo $row["vaccinationID"] ?>'><i class="fa fa-list-alt" aria-hidden="true"></i></button>                                                            
                                                            <button class="btn-batchview get_reject" data-bs-toggle="modal" data-bs-target="#modalForm"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="fa fa-times" aria-hidden="true"></i></button>                                                    
                                                        <?php
                                                    }
                                                    else if($row['status'] == "Administered"){
                                                        ?>
                                                            <button class="btn-batchview get_id" data-bs-toggle="modal" data-bs-target="#modalpatient"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="far fa-eye"></i></button>
                                                            <button class="btn-batchview" disabled><i class="fa fa-check" aria-hidden="true"></i></button>
                                                            <button class="btn-batchview-active" disabled><i class="fa fa-list-alt" aria-hidden="true"></i></button>
                                                            <button class="btn-batchview" data-bs-toggle="modal" data-bs-target="#modalForm" disabled><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <button class="btn-batchview get_id" data-bs-toggle="modal" data-bs-target="#modalpatient"  data-id='<?php echo $row["vaccinationID"] ?>'><i class="far fa-eye"></i></button>
                                                        <button class="btn-batchview" disabled><i class="fa fa-check" aria-hidden="true"></i></button>
                                                        <button class="btn-batchview" disabled><i class="fa fa-list-alt" aria-hidden="true"></i></button>
                                                        <button class="btn-batchview-active" data-bs-toggle="modal" data-bs-target="#modalForm" disabled><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>    
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- Modal Patient -->
                     <div class="modal fade" id="modalpatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Patient Appointment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="load_data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- Modal Administered -->
                      <div class="modal fade" id="modalAdministered" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Vaccination Administered</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="load_admform">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- Modal Reject -->
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Appointment Rejection Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="load_rejectform">
                                  
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on('click', ".get_id", function(e) {
                    var ids = $(this).data('id');
                    $.ajax({
                        url:"view.php",
                        method:'POST',
                        data:{id:ids},
                        success:function(data){
                            $('#load_data').html(data);
                        }
                        
                    })
                })
                
            })
        </script>
        <script>
            //show the reject form
            $(document).ready(function(){
                $(document).on('click', ".get_reject", function(e) {
                    var ids = $(this).data('id');
                    $.ajax({
                        url:"reject.php",
                        method:'POST',
                        data:{id:ids},
                        success:function(data){
                            
                            $('#load_rejectform').html(data);
                        
                        }
                        
                    })
                })
                
            })
        </script>
        <script>
            //show administered form
            $(document).ready(function(){
                $(document).on('click', ".get_administered", function(e) {
                    var ids = $(this).data('id');
                    $.ajax({
                        url:"administered.php",
                        method:'POST',
                        data:{id:ids},
                        success:function(data){
                            
                            $('#load_admform').html(data);
                        
                        }
                        
                    })
                })
                
            })
        </script>
    </body>
</html>
