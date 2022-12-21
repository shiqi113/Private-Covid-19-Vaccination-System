<?php
include('dbconnect.php');
//show the relevant data base on selection
if (isset($_POST['center_id'])) {
	$center=$_POST['center_id'];
	$str=explode("-",$center);
	$id=$str[0];
	$sql = "SELECT DISTINCT vaccineName,vaccineID,centerID FROM vaccine where centerID='$id'";
	$query = mysqli_query($con,$sql);

	if ($query->num_rows > 0 ) {
			echo '<option value="" disabled selected>--Please Select--</option>';
		 while ($row = $query->fetch_assoc()) {
			 echo '<option value="'.$row['centerID'].'-'.''.$row['vaccineName'].''.'">'.$row['vaccineName'].'</option>';

		 }
	}else{

		echo '<option>--No vaccine found--</option>';
	}

}elseif (isset($_POST['batch_id'])) {
	$batch=$_POST['batch_id'];
	$str=explode("-",$batch);
	$name=$str[1];
	$sql = "SELECT * FROM vaccine WHERE centerID='$batch' AND vaccineName = '$name'";
	$query = mysqli_query($con,$sql);
	if ($query->num_rows > 0 ) {
			echo '<option value="" disabled selected>--Please Select--</option>';
		 while ($row = $query->fetch_assoc()) {
			echo '<option value="'.$row['ID'].'/'.''.$row['batchNo'].'/'.''.$row['availableQuantity'].''.'/'.''.$row['expireDate'].''.'">'.$row['batchNo'].'</option>';

		 	//echo '<option value='.$row['batchNo'].'>'.$row['batchNo'].'</option>';
		 }
	}else{

		echo '<option>--No Batch Found--</option>';
	}

}
		
?>