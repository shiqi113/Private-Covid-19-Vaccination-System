<?php
include('dbconnect.php');
$output = '';
$rec_id = $_POST['id'];

$sql = "SELECT * FROM appointment where vaccinationID=".$rec_id;
$result = mysqli_query($con, $sql);
   while($row = mysqli_fetch_assoc($result)) {
  
   ?>
        <form action="updateAdministered.php" method="POST">
            <div class="mb-3">
                <label class="form-label">VaccinationID</label>
                <input type="text" class="form-control"  value="VID-0000<?php echo $row['vaccinationID'] ?>" readonly/>
                <input type="hidden" class="form-control"  id="vaccinationID" name="vaccinationID" value="<?php echo $row['vaccinationID'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="batchNo" value="<?php echo $row['batchNo'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="centerID" value="<?php echo $row['centerID'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="date" value="<?php echo $row['date'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="patient" value="<?php echo $row['patient'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="ic" value="<?php echo $row['ic'] ?>" readonly/>
                <input type="hidden" class="form-control"  name="vaccineName" value="<?php echo $row['vaccineName'] ?>" readonly/>

            </div>
            <div class="mb-3">
                <label class="form-label">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" placeholder="Leave a comment here" id="floatingTextarea" rows="3" required style="text-transform:capitalize"></textarea>                                        </div>
            
            <div class="modal-footer d-block">
                <button type="submit" id="submit" class="btn btn-dark float-end btn-submit">Submit</button>
            </div>
        </form>
           
   <?php
}
mysqli_close($con);
?>
