<div class="modal fade" id="edit_<?= $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Accept Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="code.php">

            
            <div class="form-group">
                <input type="hidden" name="email" id="email" value="<?php echo $row['email']; ?>">
                <input type="hidden" name="id_number" id="id_number" value="<?php echo $row['id_number']; ?>">
                <input type="hidden" name="student_id" id="student_id" value="<?php echo $row['id']; ?>">
                            <label class="form-group"> ID Number </label>
                            <input type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row['id_number']; ?>" readonly>
                                <input type="hidden" name="student_id" id="student_id" class="form-control"
                                value="<?php echo $row['id']; ?>" readonly>
                        </div>
            <div class="form-group">
                            <label class="form-group"> Name</label>
                            <input type="text" name="applicant_id" id="applicant_id" class="form-control"
                                value="<?php echo $row['lname']; ?>, <?php echo $row['fname']; ?> <?php echo $row['mname']; ?>" readonly>
                                
                        </div>
            <div class="form-group">
                            <label class="form-group"> Course </label>
                            <input type="text" name="applicant_id" id="applicant_id" class="form-control"
                                value="<?php echo $row['course_name']; ?>" readonly>
                                
                        </div>
            <div class="form-group">
                            <label class="form-group"> Year Level </label>
                            <input type="text" name="applicant_id" id="applicant_id" class="form-control"
                                value="<?php echo $row['year_name']; ?>" readonly>
                                
                        </div>
            <div class="form-group">
                            <label class="form-group"> Section </label>
                            <?php
        include_once '../../../database/config.php';
        include_once '../../../database/config2.php';
            $year = $row['year_id'];
          $query = "SELECT * FROM sections WHERE year_id = $year GROUP BY section_code ORDER BY sections ASC ";
          $result = $db->query($query);
          ?><select style="text-align: left;" name="section_id" id="section_id" class="form-control" required>
                                        <option value="" disabled selected>Available Section</option>
                                            <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($rows = $result->fetch_assoc()) {

                        


$queryss = "SELECT * FROM academic WHERE status ='1' ORDER BY academic_id DESC LIMIT 1";
$queryss_run = mysqli_query ($conn, $queryss);

$queryss1 = "SELECT * FROM semester WHERE sem_status ='1' ORDER BY semester_id DESC LIMIT 1";
$queryss_run1 = mysqli_query ($conn, $queryss1);

if (mysqli_num_rows($queryss_run1)>0) {
    foreach($queryss_run1 as $rowss1)
        ?>

 <?php
}

if (mysqli_num_rows($queryss_run)>0) {
    foreach($queryss_run as $rowss)
        ?>

    <?php
}
                        


                        $sec = $rows['section_id'];
                        $aca = $rowss['academic_start'];
                        $aca1 = $rowss['academic_end'];
                        $sem = $rowss1['semester_name'];

                        $sql="SELECT section_id from students where semester_id = '$sem' and section_id = '$sec' and academic = '$aca-$aca1' ";
                        $result1=$conn-> query($sql);
                        $count=0;
                        if ($result1-> num_rows > 0){
                            while ($row1=$result1-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        
                    ?> 
                                                   

                                                     <?php if ($count < 45): ?>
                                                         
                                                     <option value="<?php  echo $rows['section_id']?>"><?php  echo $rows['section_code']?>&emsp;|&emsp;Total students in this section <?php  echo $count?> out of 45</option>';
                                                 <?php endif ?>
                                                  <?php   }
                                                    }
                                                    ?> 
                                </select>   
                                
                        </div>
            
                            <input type="hidden" name="status_type" id="status_type" class="form-control"
                                value="Enroll Old Students" readonly>
                                

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary"> Accept Students</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->
