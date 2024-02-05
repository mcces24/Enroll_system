 <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 

 <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Information Technology' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsit_4th=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsit_4th=$bsit_4th+1;
                            }
                        }
                        
                    ?>
<?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Information Technology' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsit_1st=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsit_1st=$bsit_1st+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Information Technology' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsit_2nd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsit_2nd=$bsit_2nd+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Information Technology' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsit_3rd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsit_3rd=$bsit_3rd+1;
                            }
                        }
                        
                    ?>






                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Business Administration Financial Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsba_4th=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsba_4th=$bsba_4th+1;
                            }
                        }
                        
                    ?>
<?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Business Administration Financial Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsba_1st=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsba_1st=$bsba_1st+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Business Administration Financial Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsba_2nd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsba_2nd=$bsba_2nd+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Business Administration Financial Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsba_3rd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsba_3rd=$bsba_3rd+1;
                            }
                        }
                        
                    ?>










                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Hospitality Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bshm_4th=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bshm_4th=$bshm_4th+1;
                            }
                        }
                        
                    ?>
<?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Hospitality Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bshm_1st=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bshm_1st=$bshm_1st+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Hospitality Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bshm_2nd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bshm_2nd=$bshm_2nd+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Hospitality Management' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bshm_3rd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bshm_3rd=$bshm_3rd+1;
                            }
                        }
                        
                    ?>









                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='Bachelor of Elementary Education' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $beed_4th=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $beed_4th=$beed_4th+1;
                            }
                        }
                        
                    ?>
<?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='Bachelor of Elementary Education' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $beed_1st=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $beed_1st=$beed_1st+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='Bachelor of Elementary Education' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $beed_2nd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $beed_2nd=$beed_2nd+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='Bachelor of Elementary Education' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $beed_3rd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $beed_3rd=$beed_3rd+1;
                            }
                        }
                        
                    ?>	












                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='Bachelor of Secondary Education - Filipino' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsed_4th=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsed_4th=$bsed_4th+1;
                            }
                        }
                        
                    ?>
<?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='Bachelor of Secondary Education - Filipino' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsed_1st=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $bsed_1st=$bsed_1st+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='Bachelor of Secondary Education - Filipino' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsed_2nd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsed_2nd=$bsed_2nd+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='Bachelor of Secondary Education - Filipino' AND semester_id = '$semester' AND academic = '$academic' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                        $result=$conn-> query($sql);
                        $bsed_3rd=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $bsed_3rd=$bsed_3rd+1;
                            }
                        }
                        
                    ?>	














                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Pre Old Students'";
                        $result=$conn-> query($sql);
                        $old_students=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $old_students=$old_students+1;
                            }
                        }
                        
                    ?>	
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Enroll'";
                        $result=$conn-> query($sql);
                        $new_students=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $new_students=$new_students+1;
                            }
                        }
                        
                    ?>	


<?php endif; ?>




								<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>

								<?php 
								                                    if(isset($_GET['academic']) AND isset($_GET['semester']))
								                                    {
								                                        $filtervalues = $_GET['academic'];
								                                        $filtervalues1 = $_GET['semester'];
								                                        
								                                        ?>
								                                        
								 <?php  
								 $new_students = 0;
								 $old_students = 0
								 ?>









								 								<?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Business Administration Financial Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsba_1st=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsba_1st=$bsba_1st+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Business Administration Financial Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsba_2nd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsba_2nd=$bsba_2nd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Business Administration Financial Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsba_3rd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsba_3rd=$bsba_3rd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Business Administration Financial Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsba_4th=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsba_4th=$bsba_4th+1;
                                              
                                          }
                                      }
                                 
                                  ?>








                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Information Technology' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsit_1st=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsit_1st=$bsit_1st+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Information Technology' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsit_2nd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsit_2nd=$bsit_2nd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Information Technology' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsit_3rd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsit_3rd=$bsit_3rd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Information Technology' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsit_4th=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsit_4th=$bsit_4th+1;
                                              
                                          }
                                      }
                                 
                                  ?>












                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='BS in Hospitality Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bshm_1st=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bshm_1st=$bshm_1st+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='BS in Hospitality Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bshm_2nd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bshm_2nd=$bshm_2nd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='BS in Hospitality Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bshm_3rd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bshm_3rd=$bshm_3rd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='BS in Hospitality Management' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bshm_4th=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bshm_4th=$bshm_4th+1;
                                              
                                          }
                                      }
                                 
                                  ?>











                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='Bachelor of Elementary Education' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $beed_1st=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $beed_1st=$beed_1st+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='Bachelor of Elementary Education' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $beed_2nd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $beed_2nd=$beed_2nd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='Bachelor of Elementary Education' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $beed_3rd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $beed_3rd=$beed_3rd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='Bachelor of Elementary Education' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $beed_4th=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $beed_4th=$beed_4th+1;
                                              
                                          }
                                      }
                                 
                                  ?>







                                   <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='1st Year' AND course_name='Bachelor of Secondary Education - Filipino' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsed_1st=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsed_1st=$bsed_1st+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='2nd Year' AND course_name='Bachelor of Secondary Education - Filipino' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsed_2nd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsed_2nd=$bsed_2nd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='3rd Year' AND course_name='Bachelor of Secondary Education - Filipino' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsed_3rd=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsed_3rd=$bsed_3rd+1;
                                              
                                          }
                                      }
                                 
                                  ?>
                                  <?php
                                      $sql="SELECT * from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE year_name='4th Year' AND course_name='Bachelor of Secondary Education - Filipino' AND CONCAT(academic) LIKE '%$filtervalues%' AND CONCAT(semester_id) LIKE '%$filtervalues1%' AND (status_type = 'Enroll New Students' OR  status_type = 'Enroll Old Students')";
                                      $result=$conn-> query($sql);
                                      $bsed_4th=0;
                                      $academic = $filtervalues;
                                      $semester = $filtervalues1;
                                      if ($result-> num_rows > 0){
                                          while ($row=$result-> fetch_assoc()) {
                                  
                                              $bsed_4th=$bsed_4th+1;
                                              
                                          }
                                      }
                                 
                                  ?>








									<?php  }
                                  	else{
                                  		$new_students = 0;
 										$old_students = 0;
                                        $old = '';
                                  		$bsit_1st = 0;
                                  		$bsit_2nd = 0;
                                  		$bsit_3rd= 0;
                                  		$bsit_4th = 0;
                                  		$bsba_1st = 0;
                                  		$bsba_2nd = 0;
                                  		$bsba_3rd = 0;
                                  		$bsba_4th = 0;
                                  		$bshm_1st = 0;
                                  		$bshm_2nd = 0;
                                  		$bshm_3rd = 0;
                                  		$bshm_4th = 0;
                                  		$bsed_1st = 0;
                                  		$bsed_2nd = 0;
                                  		$bsed_3rd = 0;
                                  		$bsed_4th = 0;
                                  		$beed_1st = 0;
                                  		$beed_2nd = 0;
                                  		$beed_3rd = 0;
                                  		$beed_4th = 0;
                                  		$academic = 'None';
                                  		$semester = 'None';
                                  	}
                                  	?>


<?php endif; ?>