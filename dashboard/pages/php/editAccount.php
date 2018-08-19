<?php
date_default_timezone_set("GMT");
include("../connect.php");
include("../session.php");
if (isset($_POST['edit'])) {
	
	$regId 		= mysqli_real_escape_string($Con, $_POST['reg_id']);
	$email 		= mysqli_real_escape_string($Con, $_POST['email']);
	$username 	= mysqli_real_escape_string($Con, $_POST['user_name']);

	$sql = ("UPDATE `registration` 
	SET `registration`.email 	 = '$email',
		`registration`.user_name = '$username'
	WHERE `registration`.reg_id  = '$regId' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

#Email here
$date2          = date('d M Y H:i:s A');

  $sql            = "SELECT email, user_name FROM registration WHERE reg_id = '$regId'";
  $query          = mysqli_query($Con, $sql);
  $row            = mysqli_fetch_assoc($query);
  $account_email2  = $row['email'];
  $user_name2      = $row['user_name'];

$to       = $account_email2;
$name     = $user_name2;
$subject  = 'New notification on '.$date2.' GMT';
$messages = '<html>
<head>
<style type="text/css">
a {color: #4A72AF;}
body, #header h1, #header h2, p {margin: 0; padding: 0;}
#main {border: 1px solid #cfcece;}
img {display: block;}
#top-message p, #bottom-message p {color: #3f4042; font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
#header h1 {color: #ffffff !important; font-family: "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", sans-serif; font-size: 24px; margin-bottom: 0!important; padding-bottom: 0; }
#header h2 {color: #ffffff !important; font-family: Arial, Helvetica, sans-serif; font-size: 24px; margin-bottom: 0 !important; padding-bottom: 0; }
#header p {color: #ffffff !important; font-family: "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", sans-serif; font-size: 12px;  }
h1, h2, h3, h4, h5, h6 {margin: 0 0 0.8em 0;}
h3 {font-size: 28px; color: #444444 !important; font-family: Arial, Helvetica, sans-serif; }
h4 {font-size: 22px; color: #4A72AF !important; font-family: Arial, Helvetica, sans-serif; }
h5 {font-size: 18px; color: #444444 !important; font-family: Arial, Helvetica, sans-serif; }
p {font-size: 12px; color: #444444 !important; font-family: "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", sans-serif; line-height: 1.5;}
</style>
</head>
<body>

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="e4e4e4"><tr><td>

<table id="main" width="600" align="center" cellpadding="0" cellspacing="15" bgcolor="ffffff">
<tr>
<td>
<table id="header" cellpadding="10" cellspacing="0" align="center" bgcolor="8fb3e9">
<tr>
<td width="570" bgcolor="#B2DFDB" colspan="2"><center>
<a href = "http://45.55.81.157/">
<img src="http://45.55.81.157/assets/img/logo.png" width="500" /></center>
</a>
</td>
</tr>
<tr>
<td width="570" bgcolor="#E0F2F1" colspan="2">
<h2 style="color:#263238!important">Account notification</h2></td>
</tr>
</table><!-- header -->
</td>
</tr><!-- header -->

<tr>
<td></td>
</tr>
<tr>
<td>
<table id="content-2" cellpadding="0" cellspacing="0" align="center">
<tr>
<hr/>
<td width="570">
<p>Dear '.$user_name2.',</p>
<p>&nbsp;</p>  
You have recieved a new notification from homeworkcrest.com as follows;<br/>
<strong>Item:</strong> Update of account details <br/>
<strong>Updated by:</strong> Admin<br/>
<p>&nbsp;</p>
Cheers,<br/>
Homeworkcrest Team.
</td>
</tr>
</table><!-- content-2 -->
</td>
</tr>
<tr>
<td>
<table id="content-3" cellpadding="0" cellspacing="0" style="margin-left: 15px;">
<tr>
<td colspan="5">
<h5>Keep in touch</h5>
</td>
</tr>
<tr>
<td valign="center" style="padding:5px;">
<a href="https://www.facebook.com/HomeworkCrestcom-538673042930041/?ref=hl" target="_blank">
<img src="http://45.55.81.157/assets/img/facebook.png" width="50" />
</a>
</td>
<td width="15"></td>
<td valign="center" style="padding:5px;">
<a href="https://plus.google.com/113966469486496394717" target="_blank">
<img src="http://45.55.81.157/assets/img/gplus.png" width="50"/>
</a>
</td>
<td width="15"></td>
<td valign="center" style="padding:5px;">
<a href="https://twitter.com/homeworkcrest" target="_blank">
<img src="http://45.55.81.157/assets/img/twitter.png" width="53" />
</a>
</td>
</tr>
</table><!-- content-3 -->
</td>
</tr><!-- content-3 -->
<tr>
<td>
<hr>
</td>
</tr>
</table><!-- main -->
</td></tr></table><!-- wrapper -->
</body>
</html>';

$url = 'https://api.elasticemail.com/v2/email/send';

try{
        $post = array('from' => 'no-reply@homeworkcrest.com',
		'fromName' => 'Homeworkcrest',
		'apikey' => 'ce37fb57-eb4b-4fd2-b426-373c32b4be73',
		'subject' => $subject,
		'to' => $to,
		'bodyHtml' => $messages,
		'bodyText' => 'Text Body',
		'isTransactional' => false);
		
		$ch = curl_init();
		curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
        ));
		
        $send_mail=curl_exec ($ch);
        curl_close ($ch);
		
        //echo $result;	
}
catch(Exception $ex){
	echo $ex->getMessage();
}

 if ($query and $send_mail) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Student details have been successfully updated";
	header("location:../viewStudent.php?id=$regId");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../viewStudent.php?id=$regId");
  }

  mysqli_close($Con);

}else{
	$_SESSION['msg']="bad url request";
	header("location:../index.php");
}


?>