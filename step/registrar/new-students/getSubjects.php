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
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require '../../../database/config.php';
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if (isset($_POST['course_id']) && isset($_POST['year_id']) && isset($_POST['type'])) {
    header('Content-Type: application/json');
    // Prepare a select statement
    $start = $rows11['academic_start'];
    $end = $rows11['academic_end'];
    $semester = $rows111['semester_name'];
                                   
    $academic = "$start-$end";
    $course_id = $_POST['course_id'];
    $year_id = $_POST['year_id'];

    if ($_POST['type'] == 'irregular') {
        $query = "SELECT *, subjects.subject_code AS subjectCode
            FROM subjects
            LEFT JOIN subject_connects ON subjects.subject_code = subject_connects.subject_code AND subject_connects.academic_year = ? AND subject_connects.course_id = ?
            INNER JOIN course c ON subjects.course_id = c.course_id
            INNER JOIN year_lvl y ON subjects.year_id = y.year_id
            WHERE subjects.course_id = ? ORDER BY subjects.subject_id ";
    } else {
        $query = "SELECT *, subjects.subject_code AS subjectCode
              FROM subjects
              LEFT JOIN subject_connects ON subjects.subject_code = subject_connects.subject_code AND subject_connects.academic_year = ? AND subject_connects.course_id = ?
              INNER JOIN course c ON subjects.course_id = c.course_id
              INNER JOIN year_lvl y ON subjects.year_id = y.year_id
              WHERE subjects.year_id = ? AND subjects.course_id = ? AND subjects.semester_id = ?";
    }

    
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind parameters
        if ($_POST['type'] == 'irregular') {
            mysqli_stmt_bind_param($stmt, 'sss', $academic, $course_id, $course_id);
        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $academic, $course_id, $year_id, $course_id, $semester);
        }
        

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode(['success' => true, 'subjects' => $subjects]);
            
        } else{
            echo json_encode(['error' => 'Execution error: ' . mysqli_stmt_error($stmt)]);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}


 
// close connection
mysqli_close($conn);
?>
<?php endif; ?>
