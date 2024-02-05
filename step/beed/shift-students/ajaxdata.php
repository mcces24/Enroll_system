<?php 
include_once '../../../database/config.php';
include_once '../../../database/config2.php';
if (isset($_POST['course_id'])) {
	$query = "SELECT * FROM year_lvl where course_id=".$_POST['course_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Year Level</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['year_id'].'>'.$row['year_name'].'</option>';
		 }
	}else{

		echo '<option>No Year Level Found!</option>';
	}

}
elseif (isset($_POST['year_id'])) {
	$query = "SELECT * FROM sections where year_id=".$_POST['year_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Section</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['section_id'].'>'.$row['sections'].'</option>';
		 }
	}else{

		echo '<option>No Section Found!</option>';
	}

}


?>