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
    <title>PCVS | HOME</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo2.png" type="image/x-icon" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
                                aria-hidden="true"></i>&nbsp;Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vaccine.php"><i class="fa fa-syringe"
                                style="color: #000000;"></i>&nbsp;Vaccine</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php"><i class="fas fa-calendar-check"
                                style="color: #000000;"></i>&nbsp;Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php"><i class="fas fa-question"
                                style="color: #000000;"></i>&nbsp;FAQ</a>
                    </li>
                </ul>
                <?php
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
                                  if($vaccinationStatus == 0){
                                    ?>
                                      <li>
                                        <a class="dropdown-item get_certificate" data-bs-toggle="modal" data-bs-target="#modalCetificate" data-id='<?php echo $row["ic"] ?>'>
                                        <i class="fas fa-address-card"></i></i>&nbsp;&nbsp;Digital Certificate</a>
                                      </li>

                                    <?php
                                  }
                                ?>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                                </li>
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

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="bd-placeholder-img" src="assets/img/vaccine/vaccine-backgroundImage.jpg">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="vacineTopic">How can we fight together <br>against Coronavirus?</h1>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- What is COVID-19 -->
    <div class="container marketing">
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <img src="assets/img/vaccine/covid-19.jpg" class="aboutImage">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <br><br><br>
                    <p class="centerGreenTopic" style="font-weight: 300;">COVID-19 the disease</p>
                    <h2 class="featurette-heading"><b>About the Coronavirus</b></h2>
                    <p class="lead">Coronavirus disease 2019 (COVID-19) is an infectious disease caused by severe acute
                        respiratory syndrome
                        coronavirus 2. The disease was first identified in 2019 in Wuhan, the capital of Hubei, China,
                        and has since
                        spread globally,
                        resulting in the 2019–2021 coronavirus pandemic.</p>
                    <h2 class="featurette-heading" style="margin-top: 30px;"><b>What is the COVID-19?</b></h2>
                    <p class="lead">COVID-19 is a new strain of coronavirus that has not been previously identified in
                        humans. It
                        was first
                        identified in Wuhan, Hubei Province, China, where it has caused a large and ongoing outbreak. It
                        has since
                        spread more
                        widely in China.</p>
                    <p><a class="btn btn-secondary" href="vaccine.php"
                            style="background-color: #01cfbe;border: #01cfbe;padding: 10px;">View More Details
                            &raquo;</a></p>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>

    <!--What are the basic symptoms?-->

    <div class="privateVaccination">
        <div class="container marketing">
            <div class="py-5 text-center">
                <p class="centerGreenTopic">Symptoms of COVID-19</p>
                <h2 class="centerPurpleTopic" style="font-weight: bold">What are the basic symptoms?</h2>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <br><br>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/img/vaccine/fever.png" class="img-fluid rounded-start" alt="fever"
                                    style="padding: 20px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <br>
                                    <h5 class="centerPurpleTopic" style="font-weight: bold;">High fever</h5>
                                    <p class="card-text" style="color: #58547e;">Fever is a key symptom, experts say.
                                        Don't fixate on a
                                        number, but know it's not a fever until temperature reaches at least 39°C.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/img/vaccine/difficulty-breathing.png" class="img-fluid rounded-start"
                                    alt="difficulty-breathing" style="padding: 20px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <br>
                                    <h5 class="centerPurpleTopic" style="font-weight: bold;">Sortness of Breath</h5>
                                    <p class="card-text" style="color: #58547e;">You feel hot to touch on your chest or
                                        back It is a
                                        common sign and also may appear in 2-10 days if you affected.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <br><br>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/img/vaccine/cough.png" class="img-fluid rounded-start" alt="cough"
                                    style="padding: 20px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <br>
                                    <h5 class="centerPurpleTopic" style="font-weight: bold;">Dry Cough</h5>
                                    <p class="card-text" style="color: #58547e;">Coughing is another key symptom, but
                                        it's not just any
                                        cough, said Schaffner. It should be a dry cough that you feel in your chest.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/img/vaccine/tiredness.png" class="img-fluid rounded-start"
                                    alt="headache" style="padding: 20px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <br>
                                    <h5 class="centerPurpleTopic" style="font-weight: bold;">Headache</h5>
                                    <p class="card-text" style="color: #58547e;">Around 1 out of every 6 people who gets
                                        COVID-19 becomes
                                        seriously ill and develops difficulty breathing or shortness of breath.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--How to Protect-->

    <div class="container marketing">
        <div class="py-5 text-center">
            <p class="centerGreenTopic">Symptoms of COVID-19</p>
            <h2 class="centerPurpleTopic"><b>What are the basic symptoms?</b></h2>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="table-responsive">
                        <br><br><br><br>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50%;color: #01cfbe;">You should do</th>
                                    <th style="width: 50%;color: #E74C3C;">You should avoid</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Stay at home</td>
                                    <td>Social distance</td>
                                </tr>
                                <tr>
                                    <td>Wear mask</td>
                                    <td>Avoid animals</td>
                                </tr>
                                <tr>
                                    <td>Always use tissues</td>
                                    <td>Don't touch your face</td>
                                </tr>
                                <tr>
                                    <td>Disinfect your home</td>
                                    <td>Avoid handshaking</td>
                                </tr>
                                <tr>
                                    <td>Wash your hands</td>
                                    <td>Avoid infected surfaces</td>
                                </tr>
                                <tr>
                                    <td>Frequent self-isolation</td>
                                    <td>Avoid droplets</td>
                                </tr>
                                <tr>
                                    <td>Frequent waterintake</td>
                                    <td>Don't travel</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <h2 class="centerPurpleTopic" style="font-weight: bold;font-size: 25px;">What does
                            self-isolation involve?
                        </h2>
                        <p class="card-text" style="color: #58547e;">If you need to self-isolate, you should take action
                            immediately.
                            You must stay inside and avoid all contact with other people.</p>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <img src="assets/img/vaccine/disease-prevention.png">
                </div>
            </div>
        </div>
    </div>

    <!--Watch Hand Step-->
    <div class="privateVaccination">
        <div class="container marketing">
            <div class="py-5 text-center">
                <p class="centerGreenTopic">Hand washing process</p>
                <h2 class="centerPurpleTopic"><b>How to wash your Hands</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-1.png">
                    <h2>Step 1</h2>
                    <p>Apply soap and ruv your hands together</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-2.png">
                    <h2>Step 2</h2>
                    <p>Use one hand to rub the back of the other hand and vice versa</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-3.png">
                    <h2>Step 3</h2>
                    <p>Rub your hands together and clean between your fingers</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-4.png">
                    <h2>Step 4</h2>
                    <p>Rub the back of your fingers against your palms</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-5.png">
                    <h2>Step 5</h2>
                    <p>Rub your thumb using your other hand and vice versa</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                        src="assets/img/vaccine/washing-6.png">
                    <h2>Step 6</h2>
                    <p>Rub your tips of your fingers on the palm of your other hand and vice versa</p>
                    <br><br>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /END THE FEATURETTES -->



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