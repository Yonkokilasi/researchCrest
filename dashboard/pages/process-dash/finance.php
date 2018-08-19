<?php
include("connect.php");
include("session.php");
$val = "SELECT SUM(`order`.total) AS Total FROM `order` WHERE orderStatus != 'paid' AND orderStatus != 'unpaid'";
$query = mysqli_query($Con, $val);
$row=mysqli_fetch_assoc($query);
$result = $row['Total'];
$result2 = sha1($result);


if ($result != null) {
    echo round(($result)*0.39, 2);
} else {
    echo "0";
}

?> 