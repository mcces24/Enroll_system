<?php include "connection.php"  ?>
<div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                                <div class="table-responsive">
                        <table id="Mytableid">
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="30%">Full Name</th>
                                    <th width="20%">Address</th>
                                    <th width="25%">School Graduated</th>
                                    <th width="10%">Select All <input type="checkbox" onclick="select_all()"  id="delete"/></th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                                    
                                    $query1 = "SELECT * FROM students where status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester'";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count = 0;

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                            <tr style="text-align: center;">
                                                
                                                <td style="text-align:left"><?= $student['fname'];?> <?= $student['mname'];?> <?= $student['lname'];?></td>
                                                
                                                <td><?= $student['address']; ?></td>
                                                <td><?= $student['school_graduated']; ?></td>
                                                <td>
                                                <?php  
                                                    echo '
                            <input type="checkbox" onclick="return myfun()" id="'.$student["id"].'" name="single_select" class="single_select" data-email="'.$student["email"].'" data-name="'.$student["id"].'" />
                        
                                                    ';
                                                ?></td>
                                                
                                                <td>
                                                    <form action="" method="post">
                                                    <input type="hidden" class="email" name="email" value="<?= $student['email']; ?>" required>
                                                    <input type="hidden" class="code" name="code" value="try" required>

                                                    
                                                    <?php
                                                        
                                                        
                                                            $count = $count + 1;
                                                            echo '
                                                            
                                                                
                                                                <button type="button" name="email_button" class="btn btn-info btn-sm email_button" id="'.$count.'" data-email="'.$student["email"].'" data-name="'.$student["id"].'" data-app="'.$student["id"].'" data-action="single">Accept Request</button>
                                                                
                                                            
                                                            ';
                                                        
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>

                                
                            </tbody>
                            
                        </table>

                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable({
                                    "pageLength": 50
                                });
                            });
                            
                        </script>
                        <style type="text/css">
                            .dataTables_filter {
                            display: none;
                            }
                        </style>

                    <?php endif; ?>
<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
<h2>Pre-Enrollemnt is currently not Available</h2>

<?php endif; ?>

                            </div>
                        </div>
                    </div>