<?php
session_start();
require '../../database/config.php';

if (!isset($_SESSION['SESSION_GUIDANCE'])) {
    header("Location: login/");
    die();
} else {
    $username = $_SESSION['SESSION_GUIDANCE'];
}
?>
<?php

require '../../database/config.php';

$querys = "SELECT * FROM academic GROUP BY status";
$querys_run = mysqli_query($conn, $querys);

if (mysqli_num_rows($querys_run) > 0) {

    foreach ($querys_run as $rows)
?><?php
            }

                    ?>
        <?php

        require '../../database/config.php';

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query($conn, $querys1);

        if (mysqli_num_rows($querys_run1) > 0) {
            foreach ($querys_run1 as $rows1)
        ?><?php
            }

                    ?>
        <?php

        require '../../database/config.php';

        $querys11 = "SELECT * FROM academic WHERE status='1'";
        $querys_run11 = mysqli_query($conn, $querys11);

        if (mysqli_num_rows($querys_run11) > 0) {

            foreach ($querys_run11 as $rows11)
        ?><?php
                                        }

                                                ?>
                                    <?php

                                    require '../../database/config.php';
                                    $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
                                    $querys_run111 = mysqli_query($conn, $querys111);

                                    if (mysqli_num_rows($querys_run111) > 0) {
                                        foreach ($querys_run111 as $rows111)
                                    ?><?php
                                        }

                                                ?>

<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?> 

<?php
    require '../../database/config.php';

    // Create connection

    // Check connection

    $start = $rows11['academic_start'];
    $end = $rows11['academic_end'];
    $semester = $rows111['semester_name'];

    $academic = "$start-$end";


    $sql = "SELECT * from students  WHERE status_type='Form Done' AND academic = '$academic' AND semester_id = '$semester'";
    $result = $conn->query($sql);

    echo $result->num_rows;
    /*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Notification: " . $row["description"];
    }
} else {
    echo "0 results";
}
*/
    $conn->close();
?>

<?php endif; ?>

<?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>
    <?php echo "0"; ?>
<?php endif; ?>