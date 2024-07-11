<?php
include '../inc/head.php';
$data = applicantScoresFunction();
$applicantScoresData = isset($data['applicantScoresData']) ? $data['applicantScoresData'] : [];
$applicantListData = isset($data['applicantListData']) ? $data['applicantListData'] : [];

// print_r($applicantListData);
?>
<style>
   .swal-modal {
    width: 650px; /* Adjust the width as needed */
  }
</style>
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
               <button class="btn btn-success btn-sm" id="downloadCSVTemplate">Download Template</button>
            </div>
            <form id="importCSVScore">
               <div class="modal-body">
                  <div class="form-group">
                     <label> CSV Files | Admission Test Score </label>
                     <input class="form-control" type="file" name="CSVScore" accept=".csv" />
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-sm btn-success importCSVScoreBtn">
                        IMPORT SCORE
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="modal fade" id="addScoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Applicant Admission Score</h5>
            </div>
            <form id="addScoreForm">
               <div class="modal-body">
                  <div class="input-group mb-3">
                     <div style="float: left;" class="col-12">
                        <label class="mb-1">
                           <h6>Applicant</h6>
                        </label>
                        <select id="applicant_id" name="applicant_id" autocomplete="off" required>
                           <option value="">Select Applicant...</option>
                           <?php if (!empty($applicantListData)) : ?>
                              <?php foreach ($applicantListData as $applicant) : ?>
                                 <option value="<?= $applicant['applicant_id']; ?>" data-age="<?= $applicant['age']; ?>"><?= $applicant['applicant_id']; ?> |
                                    <?= $applicant['fname']; ?> <?= $applicant['mname']; ?> <?= $applicant['lname']; ?>
                                 </option>
                              <?php endforeach; ?>
                           <?php else : ?>
                              <option disabled>No Applicant Found</option>
                           <?php endif; ?>
                        </select>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <div style="float: left;" class="col-12 col-md-12 col-xl-12">
                        <label class="mb-1" for="admission_score">
                           <h6>Admission Score:</h6>
                        </label>
                        <input class="form-control" type="number" name="admission_score" min="0" max="100" required>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-sm btn-success addScoreBtn">
                     Add Score
                  </button>
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
                              <!-- <button name="push_notification" type="submit" style="margin-left: 20px;" class="btn btn-sm btn-primary">Send Score to Applicant's</button> -->
                           </form>
                        </div>
                        <button class="btn btn-sm float-end btn-success emportScore" style="margin-left: 20px;">Import Scores</button>
                        <button class="btn btn-sm float-end btn-warning addScore">Add Applicant Score</button>
                     </div>
                     <div class="card-body">
                        <?php if (!empty($academic) && !empty($semester)) : ?>
                           <div class="table-responsive">
                              <table id="Mytableid">
                                 <thead style="text-align: center;">
                                    <tr>
                                       <th width="10%">App Number</th>
                                       <th width="10%">Name</th>
                                       <th width="10%">Gender</th>
                                       <th width="10%">Chronological Age</th>
                                       <th width="15%">Admission Score</th>
                                       <th width="15%">Description</th>
                                       <!-- <th width="15%">Action</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    if (!empty($applicantScoresData)) {
                                       foreach ($applicantScoresData as $applicant) {
                                    ?>
                                          <tr style="text-align: center;">
                                             <td><?= $applicant['applicant_id']; ?></td>
                                             <td style="text-align:left"><?= $applicant['fname']; ?> <?= $applicant['mname']; ?> <?= $applicant['lname']; ?></td>
                                             <td><?= $applicant['gender']; ?></td>
                                             <td>
                                                <?php
                                                $birthdate = $applicant['date_of_birth'];
                                                $examDate = $applicant['sched_date'];
                                                // Create DateTime sched_date
                                                $birthdateObj = new DateTime($birthdate);
                                                $currentDateObj = new DateTime($examDate); // This will use the current date and time

                                                // Calculate the difference
                                                $interval = $birthdateObj->diff($currentDateObj);

                                                // Output the result
                                                if ($interval->m > 1) {
                                                   echo $interval->y . " Years Old " . $interval->m . " Months";
                                                } else {
                                                   echo $interval->y . " Years Old " . $interval->m . " Month";
                                                }
                                                ?>
                                             </td>
                                             <td><?= $applicant['admission_score']; ?></td>
                                             <td>
                                                <?php
                                                if ($applicant['admission_score'] >= 96) {
                                                   echo "<span class='badge badge-pill badge-primary'>Superior</span>";
                                                } elseif ($applicant['admission_score'] >= 77) {
                                                   echo "<span class='badge badge-pill badge-primary'>Above Average</span>";
                                                } elseif ($applicant['admission_score'] >= 60) {
                                                   echo "<span class='badge badge-pill badge-success'>High Average</span>";
                                                } elseif ($applicant['admission_score'] >= 40) {
                                                   echo "<span class='badge badge-pill badge-success'>Average</span>";
                                                } elseif ($applicant['admission_score'] >= 23) {
                                                   echo "<span class='badge badge-pill badge-warning'>Low Average</span>";
                                                } elseif ($applicant['admission_score'] >= 5) {
                                                   echo "<span class='badge badge-pill badge-danger'>Below Average</span>";
                                                } else {
                                                   echo "<span class='badge badge-pill badge-danger'>Low</span>";
                                                }
                                                ?>
                                             </td>
                                             <!-- <td>action</td> -->
                                          </tr>
                                    <?php
                                       }
                                    }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        <?php else : ?>
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
         var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
         $('#addScoreForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Get form data
            var formDataArray = $(this).serializeArray();
    
            // Convert formDataArray to a plain object if needed
            var formDataObject = {};
            $.each(formDataArray, function(index, field) {
               formDataObject[field.name] = field.value;
            });
            console.log(formDataObject);

            // Send the AJAX request
            $.ajax({
               url: BASE_PATH + '/Master/POST/POST.php',
               type: 'POST',
               data: {
                  type: 'addApplicantScores',
                  data: formDataObject
               },
               beforeSend: function() {
                  $('#addScoremodal').modal('hide');
                  // Show the loading spinner
                  $('.addScoreBtn').prop('disabled', true);
                  $('.addScoreBtn').html('<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...');
               },
               success: function(response) {
                  // Handle the response from the server
                  response = JSON.parse(response);
                  console.log(response);
                  if (response.status == 'success') {
                     swal({
                        title: response.message,
                        icon: response.type,
                        text: response.text,
                        button: "Okay",
                     }).then((value) => {
                        location.reload();
                     });
                  } else {
                     swal({
                        title: response.message,
                        icon: response.type,
                        text: response.text,
                        button: "Okay",
                     }).then((value) => {
                        $('.addScoreBtn').prop('disabled', false);
                        $('.addScoreBtn').html('SAVE SCORE');
                     });
                  }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  // Handle errors here
                  console.log('Error: ' + textStatus, errorThrown);
               }
            });
         });

         $('#importCSVScore').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Get form data;

            var fileInput = $('input[name=CSVScore]')[0];
            var files = fileInput.files[0];

            // Check if a file is selected
            if (files === undefined) {
               swal({
                  title: "Please select a file to import",
                  icon: "warning",
                  text: "Please select a file to import",
                  button: "Okay",
               });
               return;
            }

            // Check if the selected file is a CSV file
            if (files.type !== 'text/csv' && !files.name.endsWith('.csv')) {
               swal({
                  title: "Invalid file type",
                  icon: "error",
                  text: "Please select a CSV file to import",
                  button: "Okay",
               });
               return;
            }

            var formData = new FormData();
            var fileInput = $('input[name=CSVScore]')[0].files[0];
            formData.append('data', fileInput);
            formData.append('type', "importCSVScore");
            $.ajax({
               url: BASE_PATH + '/Master/POST/POST.php',
               type: 'POST',
               data: formData,
               contentType: false,
               processData: false,
               beforeSend: function() {
                  // Show the loading spinner
                  $('.importCSVScoreBtn').prop('disabled', true);
                  $('.importCSVScoreBtn').html('<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Importing...');
               },
               success: function(response) {
                  // Handle the response from the server
                  response = JSON.parse(response);
                  console.log(response);
                  if (response.status == 'success') {
                     if (typeof response.allDataArray !== 'undefined') {
                        var allDataArray = response.allDataArray;
                        localStorage.setItem('allDataArray', JSON.stringify(allDataArray));
                     }
                     swal({
                        title: response.message,
                        icon: response.type,
                        text: response.text,
                        buttons: {
                           cancel: "Okay",
                           confirm: "See Logs",
                        },
                     }).then((willSeeLogs) => {
                        if (willSeeLogs) {
                           window.open('./addmission-score-logs.php', '_blank');
                           location.reload();
                        } else {
                           // Reload current page
                           location.reload();
                        }
                     });
                  } else {
                     swal({
                        title: response.message,
                        icon: response.type,
                        text: response.text,
                        button: "Okay",
                     }).then((value) => {
                        $('.importCSVScoreBtn').prop('disabled', false);
                        $('.importCSVScoreBtn').html('IMPORT SCORE');
                     });
                  }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  // Handle errors here
                  console.log('Error: ' + textStatus, errorThrown);
               }
            });
         });

         $('#downloadCSVTemplate').on('click', function() {
            window.location.href = BASE_PATH + '/step/guidance/applicant-scores/AdmissionTestScoreTemplate.php';
         });

         //Tom Select
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

         $('.emportScore').on('click', function() {

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
         });
      });
   </script>
   <!-- end: JS -->
</body>

</html>