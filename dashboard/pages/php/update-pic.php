<?php
include('../session.php');
include('../connect.php');

// Set autocommit to off
    // mysqli_autocommit($Con,FALSE);
    
if (isset($_POST['save-image'])) {
//$room_id = $_GET['id'];

function uploadFiles()
    {
	if ($_FILES["photo"]["name"] != "") {
	if (copy($_FILES["photo"]["tmp_name"], "../img/user/" . $_FILES["photo"]["name"])) {}

	}
}
uploadFiles();
$photo = $_FILES["photo"]["name"];

// $sql = ("UPDATE `room` SET `room`.photo = '$photo' WHERE `room`.room_id = '$room_id'");
// $query = mysqli_query($Con,$sql) or mysql_error();

$result2 = mysqli_query($Con, "UPDATE profilepict SET name = '$photo' WHERE regId = '$session_id'");
if ($result2) {

    mysqli_query($Con,"COMMIT");
    
    $_SESSION['info']="Your photo has been successfully updated";
	header("location:../profile.php");

    } else {        
    mysqli_query($Con,"ROLLBACK");

    $_SESSION['err']="An error occured during processing, please try again";
    header("location:../profile.php");
            
    }
    // Close connection
    mysqli_close($Con);
}elseif (isset($_POST['use_default'])) {

   $result2 = mysqli_query($Con, "UPDATE profilepict SET name = 'member1.png' WHERE regId = '$session_id'");

if ($result2) {

    mysqli_query($Con,"COMMIT");
    
    $_SESSION['info']="Your photo has been successfully updated";
    header("location:../profile.php");

    } else {        
    mysqli_query($Con,"ROLLBACK");

    $_SESSION['err']="An error occured during processing, please try again";
    header("location:../profile.php");
            
    }
    // Close connection
    mysqli_close($Con);



}else{

$_SESSION['err']="An unidentified error occured";
header("location:../profile.php");
}
?>