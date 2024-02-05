<?php

include('../../../database/database_connection.php');

$column = array('First Name', 'Middle Name', 'Last Name', 'Course', 'Year Level', 'Section');

$query = "
SELECT * FROM subjects INNER JOIN course c ON subjects.course_id = c.course_id INNER JOIN year_lvl y ON subjects.year_id = y.year_id INNER JOIN sections ss ON subjects.section_id = ss.section_id WHERE course_name = 'BS in Business Administration Financial Management'
";

if(isset($_POST['filter_semester'], $_POST['filter_course'], $_POST['filter_year'], $_POST['filter_section']) && $_POST['filter_semester'] != '' && $_POST['filter_course'] != '' && $_POST['filter_year'] != '' && $_POST['filter_section'] != '')
{
 $query .= '
 AND semester_id = "'.$_POST['filter_semester'].'" AND course_name = "'.$_POST['filter_course'].'" AND year_name = "'.$_POST['filter_year'].'" AND sections = "'.$_POST['filter_section'].'" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY subject_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['subject_code'];
 $sub_array[] = $row['subject_name'];
 $sub_array[] = $row['units'];
 $sub_array[] = $row['lab_unit'];
 $sub_array[] = $row['days'];
 $sub_array[] = $row['time_sched'];
 $sub_array[] = $row['room'];
 $sub_array[] = $row['instructor'];
 $sub_array[] = $row['semester_id'];
 
 $sub_array[] = $row['year_name'];
 $sub_array[] = $row['sections'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM subjects";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>