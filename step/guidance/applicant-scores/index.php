<?php
include '../inc/head.php';
$data = applicantScoresFunction();
$applicantScoresData = isset($data['applicantScoresData']) ? $data['applicantScoresData'] : [];
$applicantListData = isset($data['applicantListData']) ? $data['applicantListData'] : [];

// print_r($applicantListData);
?>

<?php include '../inc/head.php';  ?>

<body style="width: 100%;">
   <?php
   // Load the database configuration file
   include_once '../../../database/dbConfig.php';

   // Get status message
   if (!empty($_GET['status'])) {
      switch ($_GET['status']) {
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
   <?php if (!empty($statusMsg)) { ?>
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

   <div class="sidebar-overlay"></div>
   <!-- end: Sidebar -->
   <div class="modal fade" id="editmodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"> IMPORT APPLICANT SCORE </h5>
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

         </div>
      </div>
   </div>
   <div class="modal fade" id="addScoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Admission Test Score </h5>
            </div>
            <form action="importData.php" method="post" enctype="multipart/form-data">
               <div class="modal-body">
                  <div class="input-group mb-3">
                     <div style="float: left;" class="col-12">
                        <label class="mb-1">
                           <h6>Applicant</h6>
                        </label>
                        <select id="applicant_id" name="applicant_id" autocomplete="off" required>
                           <option value="">Select Applicant...</option>
                           <?php if (!empty($applicantListData)): ?>
                              <?php foreach ($applicantListData as $applicant) : ?>
                                 <option value="<?= $applicant['applicant_id']; ?>" data-age="<?= $applicant['age']; ?>"><?= $applicant['applicant_id']; ?> | 
                                 <?= $applicant['fname']; ?> <?= $applicant['mname']; ?> <?= $applicant['lname']; ?>
                              </option>
                              <?php endforeach; ?>
                           <?php else: ?>
                              <option disabled>No Applicant Found</option>
                           <?php endif; ?>
                        </select>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Comprehension Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="comp" min="0" required>
                     </div>
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Comprehension Category:</h6>
                        </label>
                        <select id="com_cate" name="com_cate" required>
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
                        <label class="mb-1">
                           <h6>Reasoning Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="reas" min="0" required>
                     </div>
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Reasoning Category:</h6>
                        </label>
                        <select id="reas_cat" name="reas_cat" required>
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
                        <label class="mb-1">
                           <h6>Verbal Total Raw Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="verbal" min="0" required>
                     </div>
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Verbal Stanine:</h6>
                        </label>
                        <input class="form-control" type="number" name="verbal_stanine" min="0" required>
                     </div>
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Verbal Percentile:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="verbal_percen" min="0" required>
                     </div>
                     <div style="float: left;" class="col-6">
                        <label class="mb-1">
                           <h6>Verbal Category:</h6>
                        </label>
                        <select id="verbal_cat" name="verbal_cat" required>
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
                        <label class="mb-1">
                           <h6>Quantitative Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="quan" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Quantitative Category:</h6>
                        </label>
                        <select style="width: 90%;" id="quan_cat" name="quan_cat" required>
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
                        <label class="mb-1">
                           <h6>Figural Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="figu" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Figural Category:</h6>
                        </label>
                        <select name="figu_cat" id="figu_cat" required> 
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
                        <label class="mb-1">
                           <h6>Non-verbal Total Raw Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="nonver" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Non-verbal Stanine:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="nonver_stanine" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Non-verbal Percentile:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="nonver_percen" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Non-verbal Category:</h6>
                        </label>
                        <select id="nonver_cat" name="nonver_cat" required>
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
                        <label class="mb-1">
                           <h6>Total Raw Score:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="total_raw" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Total Stanine:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="total_stanine" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Total Percentile:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" name="total_percen" min="0" required>
                     </div>
                     <div style="float: left;" class="col-3 col-md-3 col-xl-3">
                        <label class="mb-1">
                           <h6>Overall Category:</h6>
                        </label>
                        <select id="total_cat" name="total_cat" required>
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
                  <div hidden class="input-group mb-3">
                     <div style="float: left;" class="col-12">
                        <label class="mb-1">
                           <h6>Age:</h6>
                        </label>
                        <input style="width: 90%;" class="form-control" type="number" id="age" name="age" min="0">
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
                        <?php if (!empty($academic) && !empty($semester)) : ?>
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
                                    if (!empty($applicantScoresData)) {
                                          foreach ($applicantScoresData as $applicant) {
                                    ?>
                                          <tr style="text-align: center;">
                                             <td><?= $applicant['applicant_id']; ?></td>
                                             <td><?= $applicant['nonver_cat']; ?></td>
                                             <td><?= $applicant['com_cate']; ?></td>
                                             <td><?= $applicant['reas_cat']; ?></td>
                                             <td><?= $applicant['verbal_cat']; ?></td>
                                             <td><?= $applicant['quan_cat']; ?></td>
                                             <td><?= $applicant['figu_cat']; ?></td>
                                             <td><?= $applicant['total_cat']; ?></td>
                                          </tr>
                                    <?php
                                       }
                                    }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        <?php else: ?>
                           <h2>Pre-Enrollemnt is currently not Available</h2>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end: Content -->
      </div>
   </main>
   <!-- end: Main -->
   <!-- start: JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <script src="../../assets/js/bootstrap.bundle.min.js"></script>|
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
      $(document).ready(function() {
         ['#applicant_id', '#com_cate', '#reas_cat', '#verbal_cat', '#quan_cat', '#figu_cat', '#nonver_cat', '#total_cat'].forEach(function(id) {
            new TomSelect(id, {
                  allowEmptyOption: false,
                  maxOptions: 10
            });
         });

         $("#applicant_id").change(function() {
            var selectedOption = $(this).find('option:selected');
            var age = selectedOption.data('age');
            $('#age').val(age);
         });
      });
      jQuery(document).ready(function() {
         jQuery("#Mytableid").DataTable({
               "pageLength": 50,
               "ordering": false,
         });
      });
   </script>

   <script type="text/javascript">
      $(document).ready(function() {

         $('.editbtn1').on('click', function() {

            $('#editmodal1').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
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
      $(document).ready(function() {

         $('.addScore').on('click', function() {

            $('#addScoremodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();

            console.log(data);


         });
      });
   </script>
   <!-- end: JS -->
</body>

</html>