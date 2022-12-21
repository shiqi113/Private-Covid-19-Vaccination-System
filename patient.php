<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PCVS |Sign Up|Patient</title>
        <link rel="icon" href="assets/img/logo2.png" type="image/x-icon" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    </head>
    <body>
        <div class="wrapper" style="padding-top: 50px;">
            <div class="inner">
                <div class="container">
                    <a href="registerType.html"><button type="button" class="btn-close" aria-label="Close" style="width:30px;height: 50px;"></button></a>
                    <div class="login-container">
                      <img src="assets/img/vaccine-signUp.png" alt="patient" style="width: 100%;"></a>
                    </div>
                    
                    <div class="registerTitle">
                        <h3>Create Your Account</h3>
                        <br>
                    </div>
                    <form action="patient_reg.php" method="post" onsubmit="return validationRegister();">
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="margin-bottom: 5px;">Username</label>
                            <input style="margin-bottom: 10px;" type="text" class="form-control" placeholder="Username" id="username" name="username">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-bottom: 5px;">Password</label>
                            <input style="margin-bottom: 10px;" type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-bottom: 5px;">Full Name</label>
                            <input style="margin-bottom: 10px; text-transform: capitalize;" type="text" class="form-control" placeholder="Full Name" id="fullName" name="fullname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-bottom: 5px;">IC No:</label>
                            <input style="margin-bottom: 10px;" type="text" class="form-control" placeholder="IC No" name="ic" id="ic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-bottom: 5px;">Phone Number</label>
                            <input style="margin-bottom: 10px;" type="phoneNumber" class="form-control" placeholder="Phone Number" id="phoneNumber" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-bottom: 5px;">Email</label>
                            <input style="margin-bottom: 10px;" type="email" class="form-control" placeholder="Email" id="email" name="email">
                        </div>
                        <br>
                        <div class="loginbtn">
                            <input type="submit" class="btn btn-dark" value="REGISTER"></input>
                        </div>
                    </form>
                    <div class="login-text" style="padding-bottom: 30px;">
                        <br>
                        <small>Already Have An Account?</small><a href="login.html"> Login Here</a>
                    </div>
    
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
        <script type="text/javascript">
            function validationRegister(){
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
                var fullName = document.getElementById("fullName").value;
                var email = document.getElementById("email").value;
                var ic = document.getElementById("ic").value;
                var phoneNumber = document.getElementById("phoneNumber").value;

                //validation
                if(username == "" || password == "" || fullName == "" || email == "" || ic =="" || phoneNumber == ""){
                    alert("Please fill in all information");
                    return false;
                }
                else if(password.length < 8){
                    alert("Password at least 8 or more charaters");
                    return false;
                }
                else if(phoneNumber.length < 10){
                    alert("Invalid phone number");
                    return false;
                }
            }
        </script>

        <script src="" async defer></script>
    </body>
</html>