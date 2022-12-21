
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCVS | LOGIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo2.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


</head>

<body>
    <div class="wrapper">
        <div class="homebtn-container">
            <a href="index.php" class="text-white"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>

        <div class="inner">
            <div class="container">
                <div class="login-container">
                    <a href="index.php"><img src="assets/img/logo.png" alt="patient" style="width: 100%;"></a>
                </div>
                <div class="registerTitle">
                    <h3>Login to your account</h3>
                </div>
                <form action="loginvalid.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
                        <div class="invalid-feedback">
                            Please fill in username.
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                        <div class="invalid-feedback">
                            Please fill in password.
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="accType">Account Type</label>
                        <select class="form-select" id="accType" name="accType" required>
                            <option value="" selected disabled>--Please Select--</option>
                            <option value="Patient">Patient</option>
                            <option value="HealthcareAdmin">Healthcare Administrator</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose an account type.
                        </div>
                    </div>
                    <br>
                    <div class="loginbtn">
                        <button id="submit" type="submit" class="btn btn-dark"><i class="fa fa-sign-in"></i> LOGIN</button>
                    </div>
                </form>
                <div class="login-text">
                    <a href="registerType.html">Don't have an account?</a>
                    <br>
                    <a href="forgot.html">Forgot Password?</a>
                </div>

            </div>
        </div>
    </div>
    
    
</body>

</html>