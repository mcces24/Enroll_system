<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    option {
        font-family: 'Poppins', sans-serif;
    }
</style>
<div class="modal fade" id="addsection_<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <form method="POST" action="code.php">


                    <div class="form-group">
                        <label class="form-group"> Course </label>
                        <input type="text" name="course" id="course" class="form-control" value="<?php echo $student['course_name']; ?>" readonly>

                    </div>
                    <div class="form-group">
                        <label class="form-group"> Year Level </label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo $student['year_name']; ?>" readonly>
                        <input type="hidden" name="year_id" id="year_id" class="form-control" value="<?php echo $student['year_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Name of Section | ex: N or A</label>
                        <input type="" name="sections" id="sections" class="form-control" placeholder="Enter New Section" required>
                    </div>
                    <div class="form-group">
                        <label>Section Code | ex: BSIT 1 N</label>
                        <input type="" name="section_code" id="section_code" class="form-control" placeholder="Enter Section Code" required>
                    </div>





                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary"> Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete -->

<div class="modal fade" id="edit_<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Document | Add Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <form method="POST" action="code.php">

    
                    <div class="form-group">
                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student['id']; ?>">
                        <input type="hidden" name="type" id="type_student" value="regular">
                        <input type="hidden" name="subjects" id="subjects" value="">
                        <label class="form-group"> Aplicant Number </label>
                        <input type="text" name="applicant_id" id="applicant_id" class="form-control" value="<?php echo $student['applicant_id']; ?>" readonly>
                        <input type="hidden" name="status_type" id="status_type" class="form-control" value="New Students" readonly>
                    </div>
                    <br>

                    <div class="form-group">


                        <input type="text" name="nso" id="nso" class="form-control" placeholder="NSO" value="" readonly style="background: aliceblue;">
                        <br>
                        <section class="radio-section">

                            <div class="radio-list">
                                <input type="hidden" name="email" id="email" value="<?php echo $student['email']; ?>">
                                <div class="radio-item">
                                    <input type="hidden" name="nso" id="nso" value="<?php echo $student['nso']; ?>">
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="nso" id="nso" value="Available" required>
                                    <label for="radio1">Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="nso" id="nso" value="Not Available" required>
                                    <label for="radio2">Not Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="nso" id="nso" value="On Procces" required>
                                    <label for="radio3">On Procces</label>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="CARD" readonly style="background: aliceblue;"><br>
                        <section class="radio-section">

                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="hidden" name="card" id="card" value="<?php echo $student['card']; ?>">
                                    <input type="radio" name="card" id="card" value="Available" required>
                                    <label for="radio1">Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="card" id="card" value="Not Available" required>
                                    <label for="radio2">Not Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="card" id="card" value="On Procces" required>
                                    <label for="radio3">On Procces</label>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="Good Moral" readonly style="background: aliceblue;"><br>
                        <section class="radio-section">

                            <div class="radio-list">
                                <div class="radio-item">
                                    <input type="hidden" name="good_moral" id="good_moral" value="<?php echo $student['good_moral']; ?>">
                                    <input type="radio" name="good_moral" id="good_moral" value="Available" required>
                                    <label for="radio1">Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="good_moral" id="good_moral" value="Not Available" required>
                                    <label for="radio2">Not Available</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="good_moral" id="good_moral" value="On Procces" required>
                                    <label for="radio3">On Procces</label>
                                </div>
                            </div>
                        </section>
                    </div>

                    <?php
                    include_once '../../../database/config.php';
                    include_once '../../../database/config2.php';
                    
                    $year = $student['year_id'];
                    $query = "SELECT * FROM sections WHERE year_id = ? GROUP BY section_code ORDER BY section_code ASC";
                    $stmt = $db->prepare($query);
                    $stmt->bind_param("i", $year);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    ?>
                    <div class="form-group">
                        <label>Sections</label>
                        <select style="text-align: left;" name="section_id" id="section_id" class="form-control" required>
                            <option value="" disabled selected>Available Section</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($rows = $result->fetch_assoc()) {
                                    $queryss = "SELECT * FROM academic WHERE status ='1' ORDER BY academic_id DESC LIMIT 1";
                                    $queryss_run = mysqli_query($conn, $queryss);

                                    $queryss1 = "SELECT * FROM semester WHERE sem_status ='1' ORDER BY semester_id DESC LIMIT 1";
                                    $queryss_run1 = mysqli_query($conn, $queryss1);

                                    if (mysqli_num_rows($queryss_run1) > 0) {
                                        foreach ($queryss_run1 as $rowss1)
                            ?>

                                    <?php
                                }

                                if (mysqli_num_rows($queryss_run) > 0) {
                                    foreach ($queryss_run as $rowss)
                                    ?>

                                    <?php
                            }



                            $sec = $rows['section_id'];
                            $aca = $rowss['academic_start'];
                            $aca1 = $rowss['academic_end'];
                            $sem = $rowss1['semester_name'];

                            $sql = "SELECT section_id from students where semester_id = '$sem' and section_id = '$sec' and academic = '$aca-$aca1' ";
                            $result1 = $conn->query($sql);
                            $count = 0;
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {

                                    $count = $count + 1;
                                }
                            }

                                    ?>


                                    <?php if ($count < 45) : ?>

                                        <option value="<?php echo $rows['section_id'] ?>"><?php echo $rows['section_code'] ?>&emsp;|&emsp;Total students in this section <?php echo $count ?> out of 45</option>';
                                    <?php endif ?>
                            <?php   }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label class="form-group"> ID NUMBER </label>
                        <?php if (in_array($rows12['status'], array('1'))) : ?>
                            <input style="color: red;" type="text" name="id_number" id="id_number" class="form-control" value="<?php echo $customer_ID; ?>" readonly="false">
                        <?php endif; ?>
                    </div>
                    <div class="form-group">

                        <?php if (in_array($rows12['status'], array('0'))) : ?>
                            <input style="color: red;" type="text" name="id_number" id="id_number" class="form-control" value="No Ongoing Academic Year" readonly>
                        <?php endif; ?>
                    </div>

                    <div class="modal-footer">
                        <?php if (in_array($rows12['status'], array('1'))) : ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary"> Enroll</button>
                        <?php endif; ?>
                        <?php if (in_array($rows12['status'], array('0'))) : ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
