<?php
date_default_timezone_set("GMT");
include("../connect.php");
include("../session.php");

if (isset($_POST['revision'])) {

$orderId              = mysqli_real_escape_string($Con, $_POST['orderId']);
$subject              = mysqli_real_escape_string($Con, $_POST['subject']);
$reasons              = mysqli_real_escape_string($Con, $_POST['reasons']);
    $new_deadline     = mysqli_real_escape_string($Con, $_POST['deadline']); 
    if ($new_deadline == "1.1") {
    $date = new DateTime(); 
    $date->modify('+1 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "1.0") {
    $date = new DateTime(); 
    $date->modify('+3 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "0.9") {
    $date = new DateTime(); 
    $date->modify('+8 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "0.8") {
    $date = new DateTime(); 
    $date->modify('+16 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "0.7") {
    $date = new DateTime(); 
    $date->modify('+24 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.6") {
    $date = new DateTime(); 
    $date->modify('+48 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.5") {
    $date = new DateTime(); 
    $date->modify('+72 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.4") {
    $date = new DateTime(); 
    $date->modify('+120 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.3") {
    $date = new DateTime(); 
    $date->modify('+168 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.2") {
    $date = new DateTime(); 
    $date->modify('+336 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.1") {
    $date = new DateTime(); 
    $date->modify('+720 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    }


$time    = date('Y-m-d h:i:s');

$sql0      = "SELECT * FROM `order` WHERE orderId = '$orderId'";
$query0    = mysqli_query($Con, $sql0);
$row0      = mysqli_fetch_assoc($query0);
$writerId = $row0['writerId'];

mysqli_autocommit($Con,false);   
       
$sql = ("INSERT INTO `r_p_w`.`complains` (`orderId`,`subject`, `reasons`, `status` , `time`) 
    VALUES ('$orderId', '$subject', '$reasons', 'revision' , '$time')");

 $query=mysqli_query($Con,$sql) or mysql_error();
  
 $sql2 = ("UPDATE `order` SET 
  `order`.orderStatus = 'revision', 
  `order`.deadline    = '$deadline' 
  WHERE `order`.OrderId = '$orderId'");
 
 $query2=mysqli_query($Con,$sql2) or mysql_error();

 $sql3 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '', '', 'Support', 'Order # $orderId has been posted for revision on $time !', 'not viewed')");

$query3 = mysqli_query($Con,$sql3) or mysql_error();

 $sql4 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '$writerId', '', 'writer', 'Order # $orderId has been posted for revision on $time GMT', 'not viewed')");

$query4 = mysqli_query($Con,$sql4) or mysql_error();

$sql8 = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `writer_stats` WHERE writerId = '$writerId'"));
$writerId   = $sql8['writerId'];
$revision       = $sql8['revision'];
if (!empty($writerId)) {
$num="1";
$val = $revision+$num;
$sql9 = mysqli_query($Con, "UPDATE `writer_stats` SET `writer_stats`.revision = '$val'  WHERE writerId = '$writerId'");
}

 if ($query and $query2 and $query3 and $query4) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Your order has been successfully posted for revision";
	header("location:../completed.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
   $_SESSION['msg']="An error occured during processing, please try again";
	 header("location:../completed.php");

  }

  mysqli_close($Con);
} else {

    $_SESSION['msg']="bad url request";
    header("location:../completed.php");

}
?>