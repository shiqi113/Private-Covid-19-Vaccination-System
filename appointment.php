<?php 
include('dbconnect.php');
session_start();
if(isset($_SESSION['username'])){
  $sql = "SELECT * FROM patient WHERE username='$_SESSION[username]'";
  $query = mysqli_query($con,$sql);
  $row=mysqli_fetch_array($query);
  $vaccinationStatus=$row['vaccinationStatus'];

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCVS | APPOINTMENT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo2.png" type="image/x-icon" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>
    <!--Nav Bar-->
    <nav id="header" class="navbar navbar-expand-sm navbar-light bg-light" aria-label="Third navbar example">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img src="assets/img/logo2.png" alt="patient" style="width:100%;"
                    class="nav-img"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
                aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav mx-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"
                                aria-hidden="true"></i>&nbsp;&nbsp;Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vaccine.php"><i class="fa fa-syringe"
                                style="color: #000000;"></i>&nbsp;&nbsp;Vaccine</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php"><i class="fas fa-calendar-check"
                                style="color: #000000;"></i>&nbsp;&nbsp;Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php"><i class="fas fa-question"
                                style="color: #000000;"></i>&nbsp;&nbsp;FAQ</a>
                    </li>
                </ul>
                <?php
                    //if isset session username show the userprofile and appointment button
                  if(isset($_SESSION['username'])){
                      ?>
                <li class="nav-item dropdown" style="list-style-type: none;margin-right: 60px;">
                    <a class="nav-link dropdown-toggle" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
                        &nbsp;
                        <img src="assets/img/vaccine/avatar.png"
                            style="border: gray solid 1px;border-radius: 50%; padding: 10px;">
                        <?php echo (strtoupper($row['fullname']));?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                        <li><img src="assets/img/vaccine/avatar64.png"
                                style="width:30%;border: gray solid 1px;border-radius: 50%; padding: 5px;margin-left:80px">
                        </li>
                        <li style="text-align: center;"><?php echo (strtoupper($row['fullname']));?></li>
                        <li style="text-align: center;"><small><?php echo ($row['email']);?></small></li>
                        <hr>

                        <li>
                            <a class="dropdown-item get_id" data-bs-toggle="modal" data-bs-target="#modalStatus"
                                data-id='<?php echo $row["ic"] ?>'>
                                <i class="far fa-calendar-alt"></i></i>&nbsp;&nbsp;Vaccination Appointment
                            </a>
                        </li>

                        <?php
                            //if fully vaccinated will show the digital certificate.
                          if($vaccinationStatus == 0){
                            ?>
                                <li>
                                  <a class="dropdown-item get_certificate" data-bs-toggle="modal" data-bs-target="#modalCetificate" data-id='<?php echo $row["ic"] ?>'>
                                  <i class="fas fa-address-card"></i></i>&nbsp;&nbsp;Digital Certificate</a>
                                </li>

                            <?php
                          }
                        ?>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
                <?php
                  }
                  else{
                      ?>
                <button type="button" class="btn btn-outline-dark me-2"
                    onclick="window.location.href='login.php'">Login</button>&nbsp;
                <button type="button" class="btn btn-warning"
                    onclick="window.location.href='registerType.html'">Register</button>
                <?php
                  }

              
              ?>
            </div>
        </div>
    </nav>
    <!--Nav Bar End-->
    <!--==========Profile Modal============-->

    <!-- Button trigger modal -->
    <!-- Button trigger modal -->
    <div class="modal fade" id="modalCetificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Digital Certificate</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="load_certificate">
          </div>
        </div>
      </div>
    </div>
    

    <!--==========Vaccine Status Modal============-->
    <div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: 	#CCCCFF;">
            <h5 class="modal-title" id="exampleModalLabel">Vaccination Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-image: url(../PCVS/assets/img/vaccine/symptoms-bg.jpg);"
              id="load_data">
          </div>
        </div>
      </div>
    </div>
  

    <!--Private Vaccination Program​-->
    <div class="privateVaccination" style="background-image: url(../PCVS/assets/img/vaccine/search_map.png);">
        <br><br><br>
        <p class="vaccinePara" style="text-align: center;">Make Appointment</p>
        <h1 class="vacineTopic" style="text-align: center;font-size: 45px;">Private COVID Vaccination Appointment</h1>
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
            <br><br>
            <div class="col"
                style=" background-color: #EBEDEF; border: #AEB6BF solid 2px; padding: 30px;border-radius: 15px 15px 15px 15px;">
                <div class="row featurette">
                    <form action="make_appointment.php" method="post" onsubmit="return validationRegister()">
                        <div class="appointmentForm">
                            <?php
                              if(isset($_SESSION['username'])){
                                  ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Full Name<b
                                                    style="color: red;"> *</b></label>
                                            <input type="text" class="form-control" id="fullName" name="patient"
                                                placeholder="Full Name" value="<?php echo ($row['fullname']);?>" readonly
                                                style="text-transform: uppercase;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">IC/ Passport No<b
                                                    style="color: red;"> *</b></label>
                                            <input type="text" class="form-control" id="icNo" name="ic"
                                                placeholder="IC/ Passport No" value="<?php echo ($row['ic']);?>" readonly>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                              }
                              else{
                                  "";
                              }
                            ?>
                            <label for="selectVaccine" style="margin-bottom: 10px;">Select Healthcare Center <b
                                    style="color: red;"> *</b></label>
                            <select name="center" class="form-select" id="center" onchange="FetchVaccine(this.value)">
                                <option value="" disabled selected>--Please Select--</option>
                                <?php
                    
                                  $sql = mysqli_query($con,"SELECT * from center ORDER BY centerID");
                                  while($row=mysqli_fetch_array($sql))
                                  {
                                      echo '<option value="'.$row['centerID'].'-'.''.$row['address'].''.'">'.$row['centername'].'</option>';

                                  } 
                                ?>
                            </select>
                            <input type="hidden" class="form-control" placeholder="center" name="centerID" id="centerID"
                                readonly>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Address</label>
                                <input type="text" class="form-control" placeholder="Address" id="address" readonly>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Vaccine</label>
                                <select name="vaccine" id="vaccine" class="form-control"
                                    onchange="FetchBatch(this.value)">
                                    <option disabled selected>--Please Select--</option>
                                </select>
                                <input type="hidden" class="form-control" placeholder="center" name="vaccineName"
                                    id="vaccineName" readonly>

                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Batch No</label>
                                <select name="batch" id="batch" class="form-control" onchange="update()" >
                                    <option value="VaccineID/Batch/Quantity/Expire Date" disabled selected>--Please Select--</option>
                                </select>
                                <input type="hidden" class="form-control" placeholder="center" name="v_ID" id="v_ID"
                                    readonly>
                                <input type="hidden" class="form-control" placeholder="center" name="batchNo"
                                    id="batchNo" readonly>

                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Available Quantity</label>
                                <input type="text" class="form-control" placeholder="quantity" id="quantity" readonly>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Expire Date</label>
                                <input type="text" class="form-control" placeholder="Expire Date" id="date" readonly>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;margin-top: 10px;">Appointment Date</label>
                                <input type="date" class="form-control" name="date"id="appdate">
                            </div>
                            <?php
                              if(isset($_SESSION['username'])){
                                  ?>
                                    <div class="d-grid gap-2">
                                        <br>
                                        <input class="btn btn-primary" type="submit" style="background-color: #1ABC9C;border: #1ABC9C;" value="Submit"></input>
                                    </div>
                                    <?php
                              }
                              else{
                                ?>
                                  <div class="d-grid gap-2">
                                      <br>
                                      <a href="login.php">
                                          <button class="btn btn-primary" type="button"
                                              style="background-color: #1ABC9C;border: #1ABC9C;"
                                              onClick="return confirm('Please Login to make an appointment')">Submit</button>
                                      </a>
                                  </div>
                                <?php
                              }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <p>&nbsp;&nbsp;* If you want know more vaccine detail, <a href="vaccine.php">click here</a>.</p>
            <br><br><br>
        </div>
    </div>
    <!-- START THE FEATURETTES -->

    </div>
    <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                <li class="nav-item"><a href="vaccine.php" class="nav-link px-2 text-white">Vaccine</a></li>
                <li class="nav-item"><a href="appointment.php" class="nav-link px-2 text-white">Appointment</a></li>
                <li class="nav-item"><a href="faq.php" class="nav-link px-2 text-white">FAQs</a></li>
            </ul>
            <p class="text-center text-white">&copy; 2021 All Right Reserved</p>
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function validationRegister(){
            var center = document.getElementById("center").value;
            var vaccine = document.getElementById("vaccine").value;
            var batch = document.getElementById("batch").value;
            var appDate = document.getElementById("appdate").value;
            //make a validation.
           
              if(center == "") {
                alert("Please select healthcare center");
                return false;
              }
              else if(vaccine =="") {
                alert("Please select vaccine");
                return false;
              }else if( vaccine =="--No vaccine found--") {
                alert("No available vaccine. Please choose another healthcare center");
                return false;
              }
              else if (batch =="") {
                alert("Please select vaccine batch");
                return false;
              }
              else if (appDate =="") {
                alert("Please select appointment Date");
                return false;
              }
              
            }
        
       
    </script>                        
    <script type="text/javascript">
    function FetchVaccine(id) {

        var select = document.getElementById('center');
        var option = select.options[select.selectedIndex];
        var text = select.options[select.selectedIndex].value;
        var array = text.split("-"); //split the vaccine ID value and pass the data to array.
        document.getElementById('centerID').value = array[0];
        document.getElementById('address').value = array[1];

        $('#vaccine').html('');
        $('#batch').html('<option>--Please Select--</option>');

        $.ajax({
            type: 'post',
            url: 'vaccine_ajax.php',
            data: {
                center_id: id
            },
            success: function(data) {
                $('#vaccine').html(data);
            }

        })
    }

    function FetchBatch(id) {

        var select = document.getElementById('vaccine');
        var option = select.options[select.selectedIndex];
        var text = select.options[select.selectedIndex].value;
        var array = text.split("-"); //split the vaccine ID value and pass the data to array.
        document.getElementById('vaccineName').value = array[1];

        $('#batch').html('');
        $.ajax({
            type: 'post',
            url: 'vaccine_ajax.php',
            data: {
                batch_id: id
            },
            success: function(data) {
                $('#batch').html(data);
            }

        })
    }
    </script>
    <script type="text/javascript">
    //user select the healthcare center will auto show the address
    function update() {
        var select = document.getElementById('batch');
        var option = select.options[select.selectedIndex];
        var text = select.options[select.selectedIndex].value;
        var array = text.split("/"); //split the vaccine ID value and pass the data to array.
        document.getElementById('v_ID').value = array[0];
        document.getElementById('batchNo').value = array[1];
        document.getElementById('quantity').value = array[2];
        document.getElementById('date').value = array[3];
    }
    update();
    </script>
    <script>
    $(document).ready(function() {
        $(document).on('click', ".get_id", function(e) {
            var ids = $(this).data('id');
            $.ajax({
                url: "viewappointment.php",
                method: 'POST',
                data: {
                    id: ids
                },
                success: function(data) {
                    $('#load_data').html(data);
                }

            })
        })

    })
    </script>
    <script>
    $(document).ready(function() {
        $(document).on('click', ".get_certificate", function(e) {
            var ids = $(this).data('id');
            $.ajax({
                url: "viewcertificate.php",
                method: 'POST',
                data: {
                    id: ids
                },
                success: function(data) {
                    $('#load_certificate').html(data);
                }

            })
        })

    })
    </script>

</body>

</html>