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

if(isset($_POST['update'])){
    $updatequantity = $_POST['updatequantity'];
    $ID = $_POST['ID'];

    $q= "UPDATE vaccine SET quantity= '$updatequantity' WHERE ID='$ID'";

    $Update_vaccine = mysqli_query($con, $q);

    if($Update_vaccine){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Successful");';
        echo 'document.location.href = "vaccineBatch.php";';
        echo '</script>';
    
    }
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
        <title>PCVS |Dashboard</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
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
                        <li><a class="dropdown-item" href="../login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
                        <h1 class="mt-4">Update Vaccine</h1>
                        <div class="card mb-4">
                            <div class="card-header text-white bg-dark">
                                <i class="fas fa-table me-1"></i>
                                Update Vaccine Information
                            </div>
                            <div class="card-body">
                            <?php
                                $ID =$_GET['ID'];
                                $currentID = $ID;
                                $sql = "SELECT * FROM vaccine WHERE ID='$ID'";

                                $gotResults=mysqli_query($con, $sql);

                                if($gotResults){
                                    if(mysqli_num_rows($gotResults)>0){
                                        while($row = mysqli_fetch_array($gotResults)){
                                            ?>
                                                <form action="#" method="POST">
                                                    <div class="row">
                                                        <input type="hidden" class="form-control" id="vaccineID" name="ID" value="<?php echo ($row['ID']);?>"readonly>
                                                        <input type="hidden" class="form-control"  name="centerID" value="<?php echo ($row['centerID']);?>" readonly>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Vaccine ID</label>
                                                                <input type="text" class="form-control" name="vaccineID"  value="<?php echo $row['vaccineID'];?>"  readonly style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Vaccine Name</label>
                                                                <input type="text" class="form-control" name="vaccineName" value="<?php echo $row['vaccineName'];?>"readonly style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Manufacturer</label>
                                                                <input type="text" class="form-control"  name="manufacturer"   value="<?php echo $row['manufacturer'];?>" readonly style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Batch Number</label>
                                                        <input type="text" class="form-control" id="batchNo" name="batchNo" value="<?php echo $row['batchNo'];?>" placeholder="Enter Batch No" readonly style="text-transform: uppercase;">
                                                    </div>
                                                    
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Expire Date</label>
                                                        <input type="date" class="form-control" name="expireDate" id="date" value="<?php echo $row['expireDate'];?>" readonly>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">The Quantity Of Doses</label>
                                                        <input type="number" class="form-control" name="updatequantity" id="quantityDose" value="<?php echo $row['quantity'];?>"  required step=1  min=1>
                                                    </div>
                                                    <br>
                                                    <div class="loginbtn">
                                                        <button name="update" class="btn btn-dark">Update</button>
                                                    </div>
                                                </form>
                                            <?php
                                        }
                                    }
                                }
                            ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
        <script src="js/datatables-simple-demo.js"></script>
       
         
    </body>
</html>
