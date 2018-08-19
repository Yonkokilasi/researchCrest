<?php
include("../connect.php");
include("../session.php");

$query = mysqli_query($Con, "DELETE FROM notifications WHERE userType = 'Support' AND status = 'viewed'");

?>

