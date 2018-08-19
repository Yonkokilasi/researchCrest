<?php
include("../connect.php");
include("../session.php");
if($_POST['rowid']) {
 
 $regId = $_POST['rowid'];

 include('../rating/index2.php');

}else{

echo "No data fetched";
}

?>

