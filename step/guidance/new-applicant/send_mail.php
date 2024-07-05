<?php
                
            ?>
<?php
                      
                        require '../../../database/dbcon.php';
                            
                            $query = "SELECT * FROM system  ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?><?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
?>
<?php
//send_mail.php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include '../../../database/config1.php';
if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$student_id = $row["name"];
		$query1 = "SELECT * FROM students WHERE id='$student_id'";
		$query_run1 = mysqli_query($conn, $query1);
		
		



		
		

	}
	if($query_run1)
	{
		echo true;
		foreach($_POST['email_data'] as $rows){

				require '../../../database/conn.php';
           
                $query2 = "select * from students order by applicant_id desc limit 1";
                $result2 = mysqli_query($conn,$query2);
                $row = mysqli_fetch_array($result2);
                $last_id = $row['applicant_id'];
                if ($last_id == "")
                {
                    $customer_ID = "APP10000001";
                }
                else
                {
                    $customer_ID = substr($last_id, 3);
                    $customer_ID = intval($customer_ID);
                    $customer_ID = "APP" . ($customer_ID + 1);
                }

		$email=$rows["name"];
		$code = 'Accept Applicant';
		$app = $customer_ID;
		$query = mysqli_query($conn, "UPDATE students SET status_type='$code', applicant_id='$app' WHERE id='$email'");
		$query1 = mysqli_query($conn, "INSERT INTO documents VALUES('','$app','','','','','','')");
		}
		

	}
	else
	{
		echo false;
	}
}

	
?>