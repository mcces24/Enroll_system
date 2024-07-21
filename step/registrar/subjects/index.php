<?php include '../inc/head.php';  ?>

<body style="width: 100%;">

    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php';  ?>

    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->
    <div class="modal fade" id="editmodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> IMPORT APPLICANT SCORE </h5>
                    <!-- <button class="btn btn-success btn-sm" id="downloadCSVTemplate">Download Template</button> -->
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
    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> IMPORT SUBJECTS </h5>
                    <button class="btn btn-success btn-sm" id="downloadCSVTemplate">Download Template</button>
                </div>

                <form action="importData.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label> Semester </label>
                            <select class="form-control" name="semester_id" id="semester_id" data-serialize
                                class="happyforms-select" required>
                                <option selected disabled class="happyforms-placeholder-option">Select Semester</option>
                                <option value="First Sem" class="happyforms-placeholder-option">First Sem</option>
                                <option value="Second Sem" class="happyforms-placeholder-option">Second Sem</option>
                                <option value="Summer" class="happyforms-placeholder-option">Summer</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label> Course </label>
                            <?php
                              include_once '../../../database/config.php';
                              include_once '../../../database/config2.php';

                              $query = "SELECT * FROM course";
                              $result = $db->query($query);
                           ?>

                            <?php if ($result->num_rows > 0) { ?>
                            <select class="form-control" name="course_id" id="course_id" onchange="FetchCourse(this.value)" require>
                                 <option disabled selected>Select Course</option>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <?php } ?>

                        </div>
                        <div class="form-group">
                            <label> Year Level </label>
                            <select class="form-control" name="year_id" id="year_id" data-serialize
                                class="happyforms-select" onchange="FetchYear(this.value)" required>
                                <option value="" class="happyforms-placeholder-option">Select Year Level</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label> Section </label>
                            <select class="form-control" name="section_id" id="section_id" data-serialize class="happyforms-select" required>
                                <option value="" class="happyforms-placeholder-option">Select Section</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label> CSV Files </label>
                            <input class="form-control" type="file" name="file" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                            <input type="submit" class="btn btn-sm btn-primary" name="importSubmit"
                                value="IMPORT/UPDATE">
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                function FetchCourse(id) {
                    $('#year_id').html('');
                    $('#section_id').html('<option>Select Section</option>');
                    $.ajax({
                        type: 'post',
                        url: 'ajaxdata.php',
                        data: {
                            course_id: id
                        },
                        success: function(data) {
                            $('#year_id').html(data);
                        }

                    })
                }

                function FetchYear(id) {
                    $('#section_id').html('');
                    $.ajax({
                        type: 'post',
                        url: 'ajaxdata.php',
                        data: {
                            year_id: id
                        },
                        success: function(data) {
                            $('#section_id').html(data);
                        }

                    })
                }
                </script>

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
                                Subjects
                                <div class="float-end">
                                    <form action="send_mail_all.php" method="post">
                                        <input type="hidden" name="semester" value="<?php echo $semester ?>">
                                        <input type="hidden" name="academic" value="<?php echo $academic ?>">
                                        <!-- <button name="push_notification" type="submit" style="margin-left: 20px;" class="btn btn-sm btn-primary">Send Score to Applicant's</button> -->
                                    </form>
                                </div>
                                <button class="btn btn-sm float-end btn-success emportSubjects"
                                    style="margin-left: 20px;">Import Subjects</button>
                                <!-- <button class="btn btn-sm float-end btn-warning addSubject">Add Subject</button> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Mytableid" class="table table-striped">
                                        <thead style="text-align: center;">
                                          <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Unit</th>
                                                <th>Lab Unit</th>
                                                <th>Days</th>
                                                <th>Time</th>
                                                <th>Room</th>
                                                <th>Instructor</th>
                                                <th>Semester</th>
                                                <th>Course</th>
                                                <th>Year</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $query = "SELECT *, subjects.subject_code as subjectCode FROM subjects LEFT JOIN subject_connects ON subjects.subject_code = subject_connects.subject_code AND subject_connects.academic_year = '$academic'  INNER JOIN course c ON subjects.course_id = c.course_id INNER JOIN year_lvl y ON subjects.year_id = y.year_id";
                                    $query_run = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                        {   
                                            $seq = 0;
                                            
                                            while($subject = mysqli_fetch_array($query_run))
                                            { 
                                    ?>
                                            <tr style="text-align: center;">
                                                <td><?= $subject['subjectCode']; ?></td>
                                                <td><?= $subject['subject_name']; ?></td>
                                                <td><?= $subject['units']; ?></td>
                                                <td><?= $subject['lab_unit']; ?></td>
                                                <td><?= !empty($subject['days']) ? $subject['days'] : 'TBA'; ?></td>
                                                <td><?= !empty($subject['time_sched']) ? $subject['time_sched'] : 'TBA'; ?></td>
                                                <td><?= !empty($subject['room']) ? $subject['room'] : 'TBA'; ?></td>
                                                <td><?= !empty($subject['instructor']) ? $subject['instructor'] : 'TBA'; ?></td>
                                                <td><?= $subject['semester_id']; ?></td>
                                                <td><?= $subject['course_name']; ?></td>
                                                <td><?= $subject['year_name']; ?></td>
                                            </tr>
                                            <?php
                                       }
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
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

    <?php if(isset($_SESSION['status'])): ?>
      <script>
         var message = "<?php echo $_SESSION['message']; ?>";
         var icon = "<?php echo $_SESSION['type']; ?>";
         swal({
            title: message,
            icon: icon,
            button: "Okay",
         });
      </script>
   <?php unset($_SESSION['status']); ?>
    <?php endif; ?>
    <script>
    $(document).ready(function() {
        var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
        $('#addSubjectForm').on('submit', function(event) {
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
                    $('#addSubjectModal').modal('hide');
                    // Show the loading spinner
                    $('.addSubjectBtn').prop('disabled', true);
                    $('.addSubjectBtn').html(
                        '<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...'
                        );
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
                            $('.addSubjectBtn').prop('disabled', false);
                            $('.addSubjectBtn').html('SAVE SCORE');
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
                    $('.importCSVScoreBtn').html(
                        '<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Importing...'
                        );
                },
                success: function(response) {
                    // Handle the response from the server
                    response = JSON.parse(response);
                    console.log(response);
                    if (response.status == 'success') {
                        if (typeof response.allDataArray !== 'undefined') {
                            var allDataArray = response.allDataArray;
                            localStorage.setItem('allDataArray', JSON.stringify(
                                allDataArray));
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
                                window.open('./addmission-score-logs.php',
                                '_blank');
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
            window.location.href = 
                '/step/CSVTemplate/SubjectsCSVTemplate.php';
        });

        //Tom Select
      //   ['#applicant_id', '#com_cate', '#reas_cat', '#verbal_cat', '#quan_cat', '#figu_cat', '#nonver_cat',
      //       '#total_cat'
      //   ].forEach(function(id) {
      //       new TomSelect(id, {
      //           allowEmptyOption: false,
      //           maxOptions: 10
      //       });
      //   });

      //   $("#applicant_id").change(function() {
      //       var selectedOption = $(this).find('option:selected');
      //       var age = selectedOption.data('age');
      //       $('#age').val(age);
      //   });

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

        $('.emportSubjects').on('click', function() {

            $('#addSubjectModal').modal('show');

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
        $('.addSubject').on('click', function() {
            $('#addSubjectModal').modal('show');
        });
    });
    </script>
    <!-- end: JS -->
</body>

</html>