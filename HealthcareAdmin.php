<?php 
include('dbconnect.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCVS |Sign Up</title>
    <link rel="icon" href="assets/img/logo2.png" type="image/x-icon" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="homebtn-container">
            <a href="index.php" class="text-white"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="inner">
            <div class="container">
                <div class="login-container">
                  <img src="assets/img/Healthcare-Administrator.png" alt="patient" style="width: 100%;"></a>
                </div>
                <div class="registerTitle">
                    <h3>Create Your Account</h3>
                </div>
                <form action="admin_reg.php" method="post"  onsubmit="return validationRegister()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Healthcare Centre</label>
                                <select class="form-select" id="center" onChange="update()"  id="address">
                                <option value="" disabled selected>--Please Select--</option>
                                <?php
                                    $sql = "SELECT * FROM center";
                                    $gotResults=mysqli_query($con, $sql);

                                    if($gotResults){
                                        if(mysqli_num_rows($gotResults)>0){
                                            while($row = mysqli_fetch_array($gotResults)){
                                            ?>
                                                <option value="<?php echo $row['centername']. "-" .$row['address'];?>"><?php echo $row['centername'];?></option>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                                </select>
                                <input  class="form-control" placeholder="centername"  id="centername" name="centername" type="hidden">

                                <input type="text"  class="form-control" name="new_centre" id="new_centre"  placeholder="Healthcare Centre" style="display:none;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" placeholder="Address"  id="address" name="address" type="hidden" readonly>
                                <input type="text"  class="form-control" id="new_address"  name="new_address" placeholder="Address" style="display:none;" >
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2"  value="true" type="checkbox" name="chk_newCentre" onclick="myFunction()">
                        <label for="checkbox2">Not In List?</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"  >

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder=" Enter Password" id="password" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="fullname" name="fullname" >
                        <div class="error" id="message"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" >

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">StaffID</label>
                        <input type="text" class="form-control" placeholder="Enter StaffID" id="staffID" name="staffID" >
                    </div>
                    <br>
                    <div class="loginbtn">
                        <input type="submit" class="btn btn-dark" value="REGISTER"></input>
                    </div>
                </form>
                <div class="login-text">
                    <small>Already Have An Account?</small><a href="login.php">Login Here</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
    <script type="text/javascript">
    //user select the healthcare center will auto show the address
        function update() {
            var select = document.getElementById('center');
            var option = select.options[select.selectedIndex];
            var text=select.options[select.selectedIndex].value;
            var array= text.split("-");//split the vaccine ID value and pass the data to array.
            document.getElementById('centername').value = array[0];
            document.getElementById('address').value = array[1];
            
        }
        update();
    </script>
     <script type="text/javascript">
     //If there is no health care center in the selection box, the user is allowed to click the checkbox to manually type the information
        function myFunction() {
            var checkBox = document.getElementById("checkbox2");
            var center = document.getElementById("center");
            var address = document.getElementById("address");
            var new_centre = document.getElementById("new_centre");
            var new_address = document.getElementById("new_address");
            //if checkbox is checked show the input box for user type data
            if (checkBox.checked == true) {
                center.style.display = "none";
                address.style.display = "none";
                new_centre.style.display = "block";
                new_address.style.display = "block";
                document.getElementById("center").disabled = false;

            } else {
                center.style.display = "block";
                address.style.display = "block";
                new_centre.style.display = "none";
                new_address.style.display = "none";
            }
        }
    </script>
     <script type="text/javascript">
        function validationRegister(){
            var center = document.getElementById("center").value;
            var address = document.getElementById("address").value;
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var fullname = document.getElementById("fullname").value;
            var staffID = document.getElementById("staffID").value;
            var new_centre = document.getElementById("new_centre").value;
            var new_address = document.getElementById("new_address").value;
            var checkbox = document.getElementById("checkbox2").checked;
            //make a validation.
            if(checkbox == true){
                if(new_centre == "") {
                    alert("Please fill in healthcare center");
                    return false;
                }
                else if(new_address =="") {
                    alert("Please fill in address");
                    return false;
                }
                else if(username =="") {
                    alert("Please fill in username");
                    return false;
                }
                else if( password =="") {
                    alert("Please fill in password");
                    return false;
                }
                else if(fullname =="" ) {
                    alert("Please fill in full name");
                    return false;
                }
                else if(email =="") {
                    alert("Please fill in email");
                    return false;
                }
                else if(staffID =="" ) {
                    alert("Please fill in staffID");
                    return false;
                }
                else if(password.length < 8){
                    alert("Password at least 8 or more charaters");
                    return false;
                }
                else if(staffID.length < 5){
                    alert("Staff ID at least 5 or more charaters");
                    return false;

                }
            }else{
                if(center == "") {
                    alert("Please select the healthcare center");
                    return false;
                }
                else if(username =="") {
                    alert("Please fill in username");
                    return false;
                }
                else if( password =="") {
                    alert("Please fill in password");
                    return false;
                }
                else if(fullname =="" ) {
                    alert("Please fill in full name");
                    return false;
                }
                else if(email =="") {
                    alert("Please fill in email");
                    return false;
                }
                else if(staffID =="" ) {
                    alert("Please fill in staffID");
                    return false;
                }
                else if(password.length < 8){
                    alert("Password at least 8 or more charaters");
                    return false;
                }
                else if(staffID.length < 5){
                    alert("Staff ID at least 5 or more charaters");
                    return false;

                }
            }
        }
       
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>