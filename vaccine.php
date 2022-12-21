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
  <title>PCVS | VACCINE</title>
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
          if(isset($_SESSION['username'])){
            ?>
              <li class="nav-item dropdown" style="list-style-type: none;margin-right: 60px;">
                <a class="nav-link dropdown-toggle" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
                  &nbsp;
                  <img src="assets/img/vaccine/avatar.png" style="border: gray solid 1px;border-radius: 50%; padding: 10px;">
                  <?php echo (strtoupper($row['fullname']));?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown03">
                  <li><img src="assets/img/vaccine/avatar64.png"
                      style="width:30%;border: gray solid 1px;border-radius: 50%; padding: 5px;margin-left:80px"></li>
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
              <button type="button" class="btn btn-outline-dark me-2" onclick="window.location.href='login.php'">Login</button>&nbsp;
              <button type="button" class="btn btn-warning" onclick="window.location.href='registerType.html'">Register</button>
            <?php
          }
        ?>

      </div>
    </div>
  </nav>
  <!--Nav Bar End-->
  <!--==========Profile Modal============-->

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

  <div class="vaccine">
    <p class="vaccinePara">Stop COVID-19 together</p>
    <h1 class="vacineTopic">Private COVID Vaccination</h1>
  </div>

  <!--Private Vaccination Program​-->
  <div class="container marketing">
    <div class="row">
      <div class="col-xl-6">
        <div class="card mb-4">
          <br><br>
          <img src="assets/img/vaccine/education.png" class="privateVaccinationImage">
          <br><br>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card mb-4" style="margin-top: 130px;">
          <p class="centerGreenTopic" style="font-weight: 300;">Private Vaccination Program​</p>
          <h2 class="featurette-heading"><b>How the Private Vaccination Progress?</b></h2>
          <p class="lead">Our PCVS system are licensed provider of the <b>Sinovac-Coronavac (Sinovac)</b>,
            <b>AstraZeneca</b> and <b>Pfizer</b> COVID-19 vaccine and
            private vaccination program is now open for registration.
          </p>
          <p class="lead">To book an appointment, please submit your details in the <a href="appointment.php"
              style="color: #9B59B6;font-weight: 600;">registration form</a>
            at Appointment page. For any additional enquiries, you may fill in <a href="faq.php"
              style="color: #9B59B6;font-weight: 600;">FAQ form</a> at FAQ page
            send the message to ask us.</p>
        </div>
      </div>
    </div>
  </div>

  <!--About COVID-19 Vaccine-->
  <div class="privateVaccination">
    <div class="container marketing">
      <div class="py-5 text-center">
        <p class="centerGreenTopic">COVID-19 Vaccine​</p>
        <h2 class="centerPurpleTopic" style="font-weight: bold;">About the COVID-19 Vaccine</h2>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" style="margin-top: 40px;">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Sinovac-Coronavac</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">RM 350<small class="text-muted fw-light"
                    style="font-size: 25px;">/2 Does</small></h1>
                <small class="text-muted fw-light" style="font-size: 20px;">Manufacturer: China</small>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><img src="assets/img/vaccine/sinovac.jfif" class="img-thumbnail"></li>
                  <b>
                    <hr>
                  </b>
                  <li>3 - 4 weeks apart</li>
                  <hr>
                  <li>Adults 18 years and older</li>
                  <hr>
                  <li>Malaysian and PR<br>(not received any dose before)</li>
                  <hr>
                  <li>Foreign workers are eligible to register</li>
                  <hr>
                  <li>Person holding a valid long-term visit pass <br> are eligible to register</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">AstraZeneca</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">RM 395<small class="text-muted fw-light"
                    style="font-size: 25px;">/2 Does</small></h1>
                <small class="text-muted fw-light" style="font-size: 20px;">Manufacturer: UK</small>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><img src="assets/img/vaccine/dt_210401_astrazeneca_covid_vaccine_800x450.webp"
                      class="img-thumbnail"></li>
                  <b>
                    <hr>
                  </b>
                  <li>4 - 12 weeks apart</li>
                  <hr>
                  <li>Adults 18 years and older</li>
                  <hr>
                  <li>Malaysian and PR<br>(not received any dose before)</li>
                  <hr>
                  <li>Foreign workers are eligible to register</li>
                  <hr>
                  <li>Person holding a valid long-term visit pass <br> are eligible to register</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Pfizer</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">RM 342<small class="text-muted fw-light"
                    style="font-size: 25px;">/2 Does</small></h1>
                <small class="text-muted fw-light" style="font-size: 20px;">Manufacturer: USA</small>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><img src="assets/img/vaccine/Cropped-161329212320210214 pfizer.jfif" class="img-thumbnail"></li>
                  <b>
                    <hr>
                  </b>
                  <li>21 days apart</li>
                  <hr>
                  <li>Adults 18 years and older</li>
                  <hr>
                  <li>Malaysian and PR<br>(not received any dose before)</li>
                  <hr>
                  <li>Foreign workers are eligible to register</li>
                  <hr>
                  <li>Person holding a valid long-term visit pass <br> are eligible to register</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Doctor-->
  <div class="container marketing">
    <div class="py-5 text-center">
      <p class="lead" style="color: #01cfbe;font-weight: bold;font-size: 23px; font-family: Monaco, Monospace;">Meet the
        Experts</p>
      <h1 style="font-weight: bold;color: #58547e;font-family: Monaco, Monospace;">Our Teams</h1>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="assets/img/vaccine/doctors-1.png"
          style="background-color: #85929E;padding: 3px;">
        <h2 style="color: #58547e;font-family: Monaco, Monospace;font-size: 30px;">Dr Taylor Hawk</h2>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="assets/img/vaccine/doctors-2.png"
          style="background-color: #85929E;padding: 3px;">
        <h2 style="color: #58547e;font-family: Monaco, Monospace;">Dr Pamela Smith</h2>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="assets/img/vaccine/doctors-3.png"
          style="background-color: #85929E;padding: 3px;">
        <h2 style="color: #58547e;font-family: Monaco, Monospace;">Dr Rechel Yap</h2>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div>

  <!--Link Appointment-->
  <div class="privateVaccination">
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold">Private COVID Vaccination</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Do you want to make appointment OR have any question?</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="appointment.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3"
              style="background-color: #48C9B0;border: #48C9B0;">Make Appointment</button></a>
          <a href="faq.php"><button type="button" class="btn btn-outline-secondary btn-lg px-4">FAQ</button></a>
        </div>
      </div>
    </div>
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