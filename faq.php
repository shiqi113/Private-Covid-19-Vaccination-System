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
        <title>PCVS | FAQ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/logo2.png"  type="image/x-icon"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" >
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

  <!-- Button trigger modal -->
  <div class="modal fade" id="modalCetificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="patient-card1">
            <div class="card-background">
              <div class="half-background">
                <div class="head">
                  <div>
                    <h2>Patient</h2>
                    <p>P00001</p>
                  </div>
                </div>
              </div>
              <div class="avatar">
                <div class="img">
                  <img src="assets/img/patient.png" alt="">
                </div>
                <p>TAN SHI QI</p>
                <p>000113-01-1268</p>

              </div>
              <div class="info1">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-blue"><strong>Dose 1</strong></li>
                  <li class="list-group-item"><i class="far fa-hospital"></i> Healthcare centre:Hospital Penang</li>
                  <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Date:10/12/20211</li>
                  <li class="list-group-item"><i class="fa fa-syringe"></i> Vaccine Name: PFIZER</li>
                  <li class="list-group-item"><i class="fa fa-syringe"></i> Batch No: FG2975</li>
                </ul>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-blue"><strong>Dose 1</strong></li>
                  <li class="list-group-item"><i class="far fa-hospital"></i> Healthcare centre:Hospital Penang</li>
                  <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Date:10/12/20211</li>
                  <li class="list-group-item"><i class="fa fa-syringe"></i> Vaccine Name: PFIZER</li>
                  <li class="list-group-item"><i class="fa fa-syringe"></i> Batch No: FG2975</li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--==========Vaccine Status Modal============-->
  <div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: 	#CCCCFF;">
          <h5 class="modal-title" id="exampleModalLabel">Vacination Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body" style="background-image: url(../PCVS/assets/img/vaccine/symptoms-bg.jpg);">
          <div class="container">
            <small>Name</small>
            <h5>GAN XIN CHIEN</h5>
            <small>IC/ Passport No</small>
            <h5>000712-54-5435</h5>
            <div id="timeline">
              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content">
                  <h3>Registered<br><small style="font-size: 14px;">[23-Jul]</small></h3>
                  <p style="margin-top: 10px;">
                    <strong>Status</strong> <span class="badge bg-secondary"> Pending</span><br>
                    <strong>Vaccination ID:</strong>VID-00001<br>
                    <strong>Batch No:</strong> A1794<br>
                    <strong>Date</strong> 8/31/2021<br>
                  </p>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content right">
                  <h3>Eligible for vaccine?<br><small style="font-size: 14px;">[3-Aug]</small>
                  </h3>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content">
                  <h3>1st Dose Appointment<br><small style="font-size: 14px;">[12-Aug]</small>
                  </h3>
                  <p style="margin-top: 10px;">
                    <b style="font-weight: 600;">Health Facility:</b>Slim River Hospital<br>
                    <b style="font-weight: 600;">Vaccination Location:</b>35800 Slim River, Perak.<br>
                    <b style="font-weight: 600;">Date:</b>8/31/2021 4.30PM<br>
                  </p>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content right">
                  <h3>
                    1st Dose Completed<br><small style="font-size: 14px;">[31-Aug]</small>
                  </h3>
                  <p style="margin-top: 10px;">
                    <strong>Date:</strong> 31-Aug-2021 15:00PM<br>
                    <strong>Vaccine Number:</strong> VID-00001<br>
                    <strong>Batch No:</strong> A1794<br>
                    <strong>Expiry Date:</strong> 8/31/2021
                  </p>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content">
                  <h3>2st Dose Appointment<br><small style="font-size: 14px;">[31-Sep]</small>
                  </h3>
                  <p style="margin-top: 10px;">
                    <b style="font-weight: 600;">Health Facility:</b>Slim River Hospital<br>
                    <b style="font-weight: 600;">Vaccination Location:</b>35800 Slim River, Perak.<br>
                    <b style="font-weight: 600;">Date:</b>10/20/2021 4.30PM<br>

                  </p>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content right">
                  <h3 style="font-size: 20px;">2st Dose Completed<br><small style="font-size: 14px;">[20-Oct]</small>
                  </h3>
                  <p style="margin-top: 10px;">
                    <strong>Date:</strong> 31-Aug-2021 15:00PM<br>
                    <strong>Vaccine Number:</strong> VID-00002<br>
                    <strong>Batch No:</strong> A1073<br>
                    <strong>Expiry Date:</strong> 26/10/2021
                  </p>
                  </p>
                </div>
              </div>

              <div class="timeline-item">
                <div class="timeline-icon">
                </div>
                <div class="timeline-content">
                  <h3>Digital Certificate Issued</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

        <div class="vaccine">
          <p class="vaccinePara">Frequently Asked Questions</p>
          <h1 class="vacineTopic">Find answers about COVID Vaccination</h1>
        </div>

        <!--Private Vaccination Program​-->
        <div class="container marketing">
          <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                  <br><br><br>
                  <img src="assets/img/vaccine/question.png" class="faqImage">
                  <br>
                </div>
            </div>
            <div class="col-xl-6" style="margin-top: 100px;">
                <div class="card mb-4">
                  <h2 class="featurette-heading"><b>Have any question?</b></h2>
                  <div class="faqForm">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                      <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                      <input type="phoneNumber" class="form-control" id="exampleFormControlInput2" placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="button" style="background-color: #1ABC9C;border: #1ABC9C;">Submit</button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </div>

      <!--About COVID-19 Vaccine-->
       <div class="privateVaccination">
        <div class="container marketing">
          <div class="py-3 text-center">
            <p class="centerGreenTopic">FAQ</p>
            <h1 class="centerPurpleTopic" style="font-weight: bold;">Popular Questions</h1>
          </div>
          <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card mb-4">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          I have registered for vaccination. How long must I wait to receive my appointment details?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Appointments will be made in phases based on the pre-determined category the individual falls under. Candidates will receive confirmation of date and 
                          assigned Vaccination Distribution Centre (PPV) two weeks prior to their appointment.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          What is COVID-19? <var></var>
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. The virus can cause infection in the airways which may 
                          cause symptoms such as the common cold to a severe pneumonia.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          What is the COVID-19 vaccine?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">The COVID-19 vaccine stimulates the immune system, so that if exposed to the SARS-CoV-2 virus, the body can respond to the COVID-19 infection. Various 
                          methods such as mRNA, viral vectors, deactivating viruses and protein sub-units have been used to create safe and effective COVID-19 vaccines.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                          Who can receive COVID-19 vaccine?
                        </button>
                      </h2>
                      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">All individuals aged 18 and older. However, some part of the community needs further consideration for this vaccination, namely: Individuals with severe 
                          allergies Pregnant women and nursing mothers COVID-19 positive individuals Individuals with immune system issues Currently, most of the clinical trials conducted are for volunteers 
                          aged 18 and older. Some vaccine companies will conduct clinical trials on children. Therefore, the government will consider the use of the COVID-19 vaccine on children when there 
                          is enough scientific data that proves its effectiveness and safety for this group.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                          Is the COVID-19 vaccine safe and effective?
                        </button>
                      </h2>
                      <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Yes, all COVID-19 vaccines approved by the National Pharmaceutical Regulatory Division (NPRA) for use in Malaysia are safe and effective. NPRA is the 
                          governing body responsible for evaluating vaccines that are to be registered in Malaysia. So far, the COVID-19 vaccine for Malaysia has been given conditional approval based on 
                          strict compliance with the assessment of scientific, clinical and technical data. The Drug Control Authority (PBKD) will approve the use of the vaccine for Malaysia based on the 
                          results of the NPRA assessment.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                          Can the COVID-19 vaccine be given to individuals who have been infected with COVID-19?
                        </button>
                      </h2>
                      <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Yes, the COVID-19 vaccine can be given to individuals who have recovered from a COVID-19 infection.</div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <img src="assets/img/vaccine/Daco_5224440.png" class="faq2Image">
              <br><br>
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
      <script type="text/javascript">
        function faqMessage(){
            var fullName = document.getElementById("fullName").value;
            var phoneNumber = document.getElementById("phoneNumber").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            //validation
            if(fullName == "" || phoneNumber == "" || email == "" || message == ""){
                alert("Please fill in all information");
            }else{
                var dataPreview = "You've enter the following details: \n" +
                "Full Name: " + fullName + "\n" +
                "Phone Number: " + phoneNumber + "\n" +
                "Email: " + email + "\n" +
                "Message: " + message + "\n";

                alert("Register Successful !" + "\n" + dataPreview);
            }
        }
    </script>
       
  
       
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    </body>
</html>