
<?php
session_start();

require_once ('../../../database/db.php');


if(isset($_POST['image']))
{
$get_id=$_GET['id'];
echo $get_id;

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);         
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE users SET profile ='$location1' WHERE id = '$get_id' ";

$conn->exec($sql);
$query_run = mysqli_query($conn, $sql);
if($query_run)
    {
        $_SESSION['message'] = "Image Upload/Update Successfully";
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $_SESSION['messages'] = "Image Upload/Update Successfully";
        $_SESSION['messages_icon'] = 'success';
        header('Location: '. $_SERVER['HTTP_REFERER']);        
    }
}
?>


<?php

require_once ('../../../database/db.php');


if(isset($_POST['imageadmin']))
{
$get_id=$_GET['id'];
echo $get_id;

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);         
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE admin SET profile ='$location1' WHERE id = '$get_id' ";

$conn->exec($sql);
$query_run = mysqli_query($conn, $sql);
if($query_run)
    {
        $_SESSION['message'] = "Image Upload/Update Successfully";
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $_SESSION['messages'] = "Image Upload/Update Successfully";
        $_SESSION['messages_icon'] = 'success';
        header('Location: '. $_SERVER['HTTP_REFERER']);        
    }
}
?>