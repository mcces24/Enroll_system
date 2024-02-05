<?php
   session_start();
   require '../../../database/config.php';
   
   if (!isset($_SESSION['SESSION_GUIDANCE'])) {
       header("Location: ../login/index.php");
       die();
   }
   else{
   $username = $_SESSION['SESSION_GUIDANCE'];
   }
   ?>
<?php
   require '../../../database/config.php';
   
   $querys = "SELECT * FROM academic GROUP BY status";
   $querys_run = mysqli_query ($conn, $querys);
   
   if (mysqli_num_rows($querys_run)>0) {
       
       foreach($querys_run as $rows)
           ?><?php
   }
                           
   ?>
<?php
   require '../../../database/config.php';
   
   $querys1 = "SELECT * FROM semester GROUP BY sem_status";
   $querys_run1 = mysqli_query ($conn, $querys1);
   
   if (mysqli_num_rows($querys_run1)>0) {
       foreach($querys_run1 as $rows1)
           ?><?php
   }
                           
   ?>
<?php
   require '../../../database/config.php';
   
   $querys11 = "SELECT * FROM academic WHERE status='1'";
   $querys_run11 = mysqli_query ($conn, $querys11);
   
   if (mysqli_num_rows($querys_run11)>0) {
       
       foreach($querys_run11 as $rows11)
           ?><?php
   }
                           
   ?>
<?php
   require '../../../database/config.php';
   $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
   $querys_run111 = mysqli_query ($conn, $querys111);
   
   if (mysqli_num_rows($querys_run111)>0) {
       foreach($querys_run111 as $rows111)
           ?><?php
   }
                           
   ?>
<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
<?php
   $start = $rows11['academic_start'];
   $end = $rows11['academic_end'];
   $semester = $rows111['semester_name'];
   
   $academic = "$start-$end";
   $sql="SELECT * from students  WHERE status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester'";
   $result=$conn-> query($sql);
   $count=0;
   if ($result-> num_rows > 0){
   while ($row=$result-> fetch_assoc()) {
   
   $count=$count+1;
   }
   }
   
   
   $sql="SELECT * from students  WHERE status_type='Form Done' AND academic = '$academic' AND semester_id = '$semester'";
   $result=$conn-> query($sql);
   $count_new=0;
   if ($result-> num_rows > 0){
   while ($row=$result-> fetch_assoc()) {
   
   $count_new=$count_new+1;
   }
   }
   
   ?>
<?php
   $start = $rows11['academic_start'];
   $end = $rows11['academic_end'];
   $semester = $rows111['semester_name'];
   
   $academic = "$start-$end";
   $sql="SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
   $result=$conn-> query($sql);
   $count_accept=0;
   if ($result-> num_rows > 0){
   while ($row=$result-> fetch_assoc()) {
   
   $count_accept=$count_accept+1;
   }
   }
   
   ?>
<?php endif; ?>
<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
<?php 
   $count_new = 0;
   $count = 0; 
   $count_accept = 0;
   ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- start: Icons -->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="icon" type="image" href="../../../icon.png">
      <!-- start: Icons -->
      <!-- start: CSS -->
      <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../assets/css/style.css">
      <!-- end: CSS -->
      <title>Applicant Score - Guidance Office</title>
      <script src="sweetalert.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body style="width: 100%;">
      <?php include 'message.php'  ?>
      <div class="loader-wrapper" id="preloader">
         <span class="loader"><span class="loader-inner"></span></span>
      </div>
      <link rel="stylesheet" type="text/css" href="../../../loader/styles.css" />
      <script>
         var loader = document.getElementById("preloader");
         window.addEventListener("load", function(){
           loader.style.display = "none"
         }) 
      </script> 
      <?php
         // Load the database configuration file
         include_once '../../../database/dbConfig.php';
         
         // Get status message
         if(!empty($_GET['status'])){
             switch($_GET['status']){
                 case 'succ':
                     $statusType = 'success';
                     $statusMsg = 'Study load has been imported successfully.';
                     break;
                 case 'err':
                     $statusType = 'warning';
                     $statusMsg = 'Some problem occurred, please try again.';
                     break;
                 case 'success':
                     $statusType = 'success';
                     $statusMsg = 'Email Sent Successfull';
                     break;
                 case 'error':
                     $statusType = 'warning';
                     $statusMsg = 'Email Not Sent. Please Try Again';
                     break;
                 case 'invalid_file':
                     $statusType = 'warning';
                     $statusMsg = 'Please upload a valid CSV file.';
                     break;
               case 'notfound':
                        $statusType = 'warning';
                        $statusMsg = 'Applicant ID not found!';
                        break;
               case 'addsuccess':
                        $statusType = 'success';
                        $statusMsg = 'Score added!';
                        break;
               case 'exits':
                        $statusType = 'success';
                        $statusMsg = 'Applicant have already score.';
                        break;
                 default:
                     $statusType = '';
                     $statusMsg = '';
             }
         }
         ?>
      <!-- Display status message -->
      <?php if(!empty($statusMsg)){ ?>
      <script>
         swal({
               title: "<?php echo $statusMsg; ?>",
               text: "Have a nice day!",
               icon: "<?php echo $statusType; ?>",
               button: "OKAY",
             });
      </script>
      <?php } ?>
      <!-- start: Sidebar -->
      <?php include '../inc/navbar.php';  ?>
      <script src="script.js"></script>
      <script src="new_script.js"></script>
      <script src="enroll.js"></script>
      <script src="total.js"></script>
      <script src="fill_up.js"></script>
      <div class="sidebar-overlay"></div>
      <!-- end: Sidebar -->
      <div class="modal fade" id="editmodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> IMPORT STUDY LOAD </h5>
               </div>
               <form action="importData.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                     <div class="form-group">
                        <label> CSV Files | Admission Test Score </label>
                        <input class="form-control" type="file" name="file" />
                     </div>
                     <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-primary" name="importSubmit" value="IMPORT/UPDATE">
                     </div>
                  </div>
               </form>
               <script type="text/javascript">
                  function FetchCourse(id){
                    $('#year_id').html('');
                    $('#section_id').html('<option>Select Section</option>');
                    $.ajax({
                      type:'post',
                      url: 'ajaxdata.php',
                      data : { course_id : id},
                      success : function(data){
                         $('#year_id').html(data);
                      }
                  
                    })
                  }
                  
                  function FetchYear(id){ 
                    $('#section_id').html('');
                    $.ajax({
                      type:'post',
                      url: 'ajaxdata.php',
                      data : { year_id : id},
                      success : function(data){
                         $('#section_id').html(data);
                      }
                  
                    })
                  }
               </script>
            </div>
         </div>
      </div>
      <div class="modal fade" id="addScoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Admission Test Score </h5>
               </div>
               <form action="importData.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                     <div class="input-group mb-3">
                        <div style="float: left;" class="col-12">
                           <label class="mb-1"><h6>Applicant ID</h6></label>
                           <input required style="width: 90%;" class="form-control" type="text" name="applicant_id" value="" >
                        </div>
                     </div>
                     <div class="input-group mb-3">
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Comprehension Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="comp" value="" >
                           </div>
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Comprehension Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="com_cate">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>
                     <div class="input-group mb-3">
                        <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Reasoning Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="reas" value="" >
                           </div>
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Reasoning Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="reas_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>

                     <div class="input-group mb-3">
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Verbal Total Raw Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="verbal" value="" >
                           </div>
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Verbal Stanine:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="verbal_stanine" value="" >
                           </div>
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Verbal Percentile:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="verbal_percen" value="" >
                           </div>
                           <div style="float: left;" class="col-6">
                              <label class="mb-1"><h6>Verbal Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="verbal_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>

                     <div class="input-group mb-3">
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Quantitative Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="quan" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Quantitative Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="quan_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Figural Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="figu" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Figural Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="figu_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>

                     <div class="input-group mb-3">
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Non-verbal Total Raw Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="nonver" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Non-verbal Stanine:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="nonver_stanine" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Non-verbal Percentile:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="nonver_percen" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Non-verbal Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="nonver_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>

                     <div class="input-group mb-3">
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Total Raw Score:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="total_raw" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Total Stanine:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="total_stanine" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Total Percentile:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="total_percen" value="" >
                           </div>
                           <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                              <label class="mb-1"><h6>Overall Category:</h6></label>
                              <select style="width: 90%;" class="form-control" name="total_cat">
                                 <option disabled>Select Catergory</option>
                                 <option value="Superior">Superior</option>
                                 <option value="Above Average">Above Average</option>
                                 <option value="High Average">High Average</option>
                                 <option value="Average">Average</option>
                                 <option value="Low Average">Low Average</option>
                                 <option value="Below Average">Below Average</option>
                                 <option value="Low">Low</option>
                              </select>
                           </div>
                     </div>
                     <div class="input-group mb-3">
                        <div hidden style="float: left;" class="col-12">
                              <label class="mb-1"><h6>Age:</h6></label>
                              <input style="width: 90%;" class="form-control" type="text" name="age" value="" >
                           </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-primary" name="addscore" value="SAVE / UPDATE">
                     </div>
               </form>
               
            </div>
         </div>
      </div>
      <!-- start: Main -->
      <main class="bg-light">
         <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
               <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
               <h5 class="fw-bold mb-0 me-auto">Applicant Admission Test Scores</h5>
               <div class="dropdown me-3  d-sm-block">
                  <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $count+$count_new; ?></span></i>
                  </div>
                  <div class="dropdown-menu fx-dropdown-menu">
                     <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                     <h5 class="p-3 bg-indigo text-light">Notification</h5>
                     <div class="list-group list-group-flush">
                        <a href="../new-applicant/index.php"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                           <div class="me-auto">
                              <div class="fw-semibold">Pre-Enrolled Applicant</div>
                              <span class="fs-7">For Academic <?php echo $academic; ?>, <?php echo $semester; ?></span>
                           </div>
                           <span class="badge bg-primary rounded-pill"><span id="accept"></span></span>
                        </a>
                        <a href="../applicant-info/index.php"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                           <div class="me-auto">
                              <div class="fw-semibold">Applicant Form</div>
                              <span class="fs-7">Total Number of New Applicant who filled the form</span>
                           </div>
                           <span class="badge bg-primary rounded-pill"><span id="enroll"></span></span>
                        </a>
                     </div>
                     <?php else: ?>
                     <h5 class="p-3 bg-indigo text-light">No Notification</h5>
                     <?php endif; ?>
                  </div>
               </div>
               <?php include '../inc/dropdown.php' ?>
            </nav>
            <!-- end: Navbar -->
            <!-- start: Content -->
            <div class="py-4">
               <!-- start: Summary -->
               <!-- end: Summary -->
               <!-- start: Graph -->
               <div class="row g-3 mt-2">
                  <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                     <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                           Applicant Scores | Admission Test
                           <div class="float-end">
                              <form action="send_mail_all.php" method="post">
                                 <input type="hidden" name="semester" value="<?php echo $semester ?>">
                                 <input type="hidden" name="academic" value="<?php echo $academic ?>">
                                 <button name="push_notification" type="submit" style="margin-left: 20px;" class="btn btn-sm btn-primary">Send Score to Applicant's</button>
                              </form>
                           </div>
                           <button class="btn btn-sm float-end btn-success editbtn1" style="margin-left: 20px;">Import Scores</button>
                           <button class="btn btn-sm float-end btn-warning addScore">Add Applicant Score</button>
                        </div>
                        <div class="card-body">
                           <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                           <div class="table-responsive">
                              <table id="Mytableid">
                                 <thead style="text-align: center;">
                                    <tr>
                                       <th width="10%">App Number</th>
                                       <th width="15%">Non-verbal</th>
                                       <th width="15%">Comprehension</th>
                                       <th width="10%">Reasoning</th>
                                       <th width="10%">Verbal</th>
                                       <th width="15%">Quantitative</th>
                                       <th width="15%">Figural</th>
                                       <th width="15%">Overall</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php  
                                       $start = $rows11['academic_start'];
                                       $end = $rows11['academic_end'];
                                       $semester = $rows111['semester_name'];
                                       
                                       $academic = "$start-$end";
                                       
                                       $query1 = "SELECT * FROM students s INNER JOIN admission_score a ON s.applicant_id=a.applicant_id where academic = '$academic' AND semester_id = '$semester' ORDER BY admission_id DESC";
                                       
                                       $query_run1 = mysqli_query($conn, $query1);
                                       $count = 0;
                                       
                                       if(mysqli_num_rows($query_run1) > 0)
                                       {
                                           while($student = mysqli_fetch_array($query_run1))
                                           {
                                               
                                               ?>
                                    <tr style="text-align: center;">
                                       <td><?= $student['applicant_id']; ?></td>
                                       <td><?= $student['nonver_cat'];?></td>
                                       <td><?= $student['com_cate']; ?></td>
                                       <td><?= $student['reas_cat']; ?></td>
                                       <td><?= $student['verbal_cat']; ?></td>
                                       <td><?= $student['quan_cat']; ?></td>
                                       <td><?= $student['figu_cat']; ?></td>
                                       <td><?= $student['total_cat']; ?></td>
                                    </tr>
                                    <?php
                                       }
                                       }
                                       else
                                       {
                                       
                                       }
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                           <script>
                              jQuery(document).ready(function(){
                                  jQuery("#Mytableid").DataTable();
                              });
                           </script>
                           <?php endif; ?>
                           <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                           <h2>Pre-Enrollemnt is currently not Available</h2>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- end: Graph -->
            </div>
            <!-- end: Content -->
         </div>
      </main>
      <!-- end: Main -->
      <!-- start: JS -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../../assets/js/script.js"></script>
      <!-- end: JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="../../assets/js/bootstrap.bundle.min.js"></script>
      <!-- end: JS -->
      <script type="text/javascript">
         $(document).ready(function () {
         
             $('.editbtn1').on('click', function () {
         
                 $('#editmodal1').modal('show');
         
                 $tr = $(this).closest('tr');
         
                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();
         
                 console.log(data);
         
                 $('#applicant_id1').val(data[0]);
                 $('#exam_remarks').val(data[4]);
                 $('#findings').val(data[5]);
                 
             });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         
             $('.addScore').on('click', function () {
         
                 $('#addScoremodal').modal('show');
         
                 $tr = $(this).closest('tr');
         
                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();
         
                 console.log(data);
         
                 
             });
         });
      </script>


      <script>
         function select_all(){
             if(jQuery('#delete').prop("checked")){
                 jQuery('input[type=checkbox]').each(function(){
                     jQuery('#'+this.id).prop('checked',true);
                 });
             }else{
                 jQuery('input[type=checkbox]').each(function(){
                     jQuery('#'+this.id).prop('checked',false);
                 });
             }
         }
         
         function delete_all(){
             var check=confirm("Are you sure?");
             if(check==true){
                 jQuery.ajax({
                     url:'delete.php',
                     type:'post',
                     data:jQuery('#frm').serialize(),
                     success:function(result){
                         jQuery('input[type=checkbox]').each(function(){
                             if(jQuery('#'+this.id).prop("checked")){
                                 jQuery('#box'+this.id).remove();
                             }
                         });
                     }
                 });
             }
         }
      </script>   
   </body>
</html>