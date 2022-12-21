<?php
$con = mysqli_connect("localhost", "root", "", "pcvs_db");
mysqli_select_db($con, 'pcvs_db');


if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

?>