

        <?php

        require '../../../database/config.php';

        $querys = "SELECT * FROM academic GROUP BY status";
        $querys_run = mysqli_query($conn, $querys);

        if (mysqli_num_rows($querys_run) > 0) {

            foreach ($querys_run as $rows)
        ?><?php
            }

                    ?>
        <?php

        require '../../../database/config.php';

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query($conn, $querys1);

        if (mysqli_num_rows($querys_run1) > 0) {
            foreach ($querys_run1 as $rows1)
        ?><?php
            }

                    ?>
        <?php

        require '../../../database/config.php';

        $querys11 = "SELECT * FROM academic WHERE status='1'";
        $querys_run11 = mysqli_query($conn, $querys11);

        if (mysqli_num_rows($querys_run11) > 0) {

            foreach ($querys_run11 as $rows11)
        ?><?php
                                        }

                                                ?>
                                    <?php

                                    require '../../../database/config.php';
                                    $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
                                    $querys_run111 = mysqli_query($conn, $querys111);

                                    if (mysqli_num_rows($querys_run111) > 0) {
                                        foreach ($querys_run111 as $rows111)
                                    ?><?php
                                        }

                                                ?>
                            <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?> 
                            
                                <?php
                                $start = $rows11['academic_start'];
                                $end = $rows11['academic_end'];
                                $semester = $rows111['semester_name'];

                                $academic = "$start-$end";
                                $sql = "SELECT * from students  WHERE status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                                $result = $conn->query($sql);
                                $count = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count = $count + 1;
                                    }
                                }


                                $sql = "SELECT * from students  WHERE status_type='Enroll New Students' AND academic = '$academic' AND semester_id = '$semester'";
                                $result = $conn->query($sql);
                                $count_new = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count_new = $count_new + 1;
                                    }
                                }

                                ?>
                    <?php
                                $start = $rows11['academic_start'];
                                $end = $rows11['academic_end'];
                                $semester = $rows111['semester_name'];

                                $academic = "$start-$end";
                                $sql = "SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                                $result = $conn->query($sql);
                                $count_accept = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $count_accept = $count_accept + 1;
                                    }
                                }

                    ?>
                

                <?php endif; ?>


                    <?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>
                     
                        <?php
                        $count_new = 0;
                        $count = 0;
                        $count_accept = 0;
                        ?>
                    <?php endif; ?>