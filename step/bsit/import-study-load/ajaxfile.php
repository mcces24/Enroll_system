<?php
require '../../../database/config.php';
 
$fees_id = $_POST['userid'];
 
$sql = "SELECT * FROM fees where fees_id='$fees_id' ";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<div class="form-group" style="width: 100%;">
    <label> Library Fees </label>
    <input class="form-control" type="number" name="library" value="<?php echo $row['library']; ?>"  />
    <input class="form-control" type="hidden" name="fees_id" value="<?php echo $row['fees_id']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Computer Fees </label>
    <input class="form-control" type="number" name="computer" value="<?php echo $row['computer']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> School ID Fees </label>
    <input class="form-control" type="number" name="school_id" value="<?php echo $row['school_id']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Athletic Fees </label>
    <input class="form-control" type="number" name="athletic" value="<?php echo $row['athletic']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Admission Fees </label>
    <input class="form-control" type="number" name="admission" value="<?php echo $row['admission']; ?>" />
</div>
<div class="form-group" style="width: 100%;">
    <label> Development Fees </label>
    <input class="form-control" type="number" name="development" value="<?php echo $row['development']; ?>" />
</div>
<div class="form-group" style="width: 100%;">
    <label> Guidance Fees </label>
    <input class="form-control" type="number" name="guidance" value="<?php echo $row['guidance']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Handbook Fees </label>
    <input class="form-control" type="number" name="handbook" value="<?php echo $row['handbook']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Entrance Fees </label>
    <input class="form-control" type="number" name="entrance" value="<?php echo $row['entrance']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Registration Fees </label>
    <input class="form-control" type="number" name="registration" value="<?php echo $row['registration']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Medical Fees </label>
    <input class="form-control" type="number" name="medical" value="<?php echo $row['medical']; ?>"  />
</div>
<div class="form-group" style="width: 100%;">
    <label> Cultural Fees </label>
    <input class="form-control" type="number" name="cultural" value="<?php echo $row['cultural']; ?>"  />
</div>

 
<?php } ?>