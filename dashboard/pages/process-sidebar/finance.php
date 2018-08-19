<?php
include("connect.php");
include("session.php");
$val = "SELECT Sum(payment.amount) AS Total FROM payment
WHERE
payment.eligible =  'eligible' AND status = 'unrequested' ";
$query = mysqli_query($Con, $val);
$row=mysqli_fetch_assoc($query);
$result = $row['Total'];
$result2 = sha1($result);


if ($result != null) {
    echo $result;
} else {
    echo "0";
}

?> 