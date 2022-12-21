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
        <title>PCVS | Patient List</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">Patient List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="viewVaccineBatch.html">Patient</a></li>
                            <li class="breadcrumb-item active">Patient List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users"></i>
                                Patient List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="batchtable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Patient ID</th>
                                            <th>Vaccination Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody style="text-align: center;">
                                    <?php 
                                            $i = 1;
                                            $centerID=$row["centerID"];
                                            $cats = $con->query("SELECT DISTINCT appointment.patient,patient.patientID,patient.vaccinationStatus,patient.ic FROM appointment INNER JOIN patient WHERE appointment.centerID=$centerID AND appointment.patient=patient.fullname");
                                            while($row=$cats->fetch_assoc()):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td>
                                                <?php echo strtoupper($row['patient']) ?>
                                            </td>

                                            <td>
                                                VID-0000<?php echo strtoupper($row['patientID']) ?>
                                            </td>

                                            <td>
                                                <?php
                                                    if($row['vaccinationStatus'] == 0){
                                                        echo'<span class="badge bg-success">FULLY VACCINATED</span>';
                                                    }else{
                                                        echo'<span class="badge bg-warning">PARTIALLYVACCINATED</span>';

                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    ?>
                                                        <button class="btn-batchview get_status" data-bs-toggle="modal" data-bs-target="#modalpatient" data-id='<?php echo $row["ic"] ?>'><i class="far fa-eye"></i></button>
                                                    <?php
                                                
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endwhile; 

                                        ?>   
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
                                    <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="load_vaccineStatus">
                                   
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
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">VaccinationID</label>
                                            <input type="text" class="form-control"  value="P00001" readonly/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Remarks</label>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" rows="3" ></textarea>                                        </div>
                                       
                                        <div class="modal-footer d-block">
                                            <button type="submit" class="btn btn-dark float-end">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- Modal Reject -->
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Appointment Reject Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">VaccinationID</label>
                                            <input type="text" class="form-control"  value="P00001" readonly/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Remarks</label>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" rows="3" required></textarea>                                        </div>
                                       
                                        <div class="modal-footer d-block">
                                            <button type="submit" class="btn btn-dark float-end">Submit</button>
                                        </div>
                                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('click', ".get_status", function(e) {
                    var ids = $(this).data('id');
                    $.ajax({
                        url: "viewvaccineStatus.php",
                        method: 'POST',
                        data: {
                            id: ids
                        },
                        success: function(data) {
                            $('#load_vaccineStatus').html(data);
                        }

                    })
                })

            })
        </script>
    </body>
</html>
