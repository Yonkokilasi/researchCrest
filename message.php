<?php
date_default_timezone_set("GMT");
include("connect.php");
session_start();
if (isset($_POST['send_email'])) {

$name 			= mysqli_real_escape_string($Con, $_POST['name']);
$subject2 		= mysqli_real_escape_string($Con, $_POST['subject']);
$email_address 	= mysqli_real_escape_string($Con, $_POST['email_address']);
$message 		= mysqli_real_escape_string($Con, $_POST['message']);
$date2 			= date('d M Y H:i:s A');

if(isset($_POST['g-recaptcha-response'])){
	      $captcha=$_POST['g-recaptcha-response'];
	    }
	    if(!$captcha){
	        $_SESSION['err']="Please check the the captcha form.";
			header("location:../contact-us.php");
	    }
	    $secretKey = "6LeMMCkUAAAAAJq2xloYVytKOkPgv11n29PvWzjr";
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	    $responseKeys = json_decode($response,true);
	    if(intval($responseKeys["success"]) !== 1) {
	      	$_SESSION['err']="Kindly confirm that you are not a robot !";
			header("location:../contact.php");
	    } else {

	$cr = "SELECT * FROM `registration` WHERE user_type = 'admin'  AND account_status = 'active' AND activation_status = 'active'";
	$tl = mysqli_query($Con, $cr);
	while($np = mysqli_fetch_assoc($tl)){
	$ad_email = $np['email'];
	$ad_user_name = $np['user_name'];

 	$to       = $ad_email;
    $name     = $ad_user_name;
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
              <a href = "https://www.researchpaperweb.com/">
              <img src="https://www.researchpaperweb.com/assets/img/rpwLOGO.png" width="200" /></center>
              </a>
              </td>
            </tr>
            <tr>
              <td width="570" bgcolor="#E0F2F1" colspan="2">
              <h2 style="color:#263238!important">New notification</h2></td>
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
    <p>Dear '.$name.',</p>
    <p>&nbsp;</p>  
    You have recieved a new email from researchpaperweb.com as follows<br/>
    <strong>From:</strong> '.$name.'<br/>
	<strong>Email:</strong> '.$email_address.'<br/>
	<strong>Subject:</strong> '.$subject2.'<br/>
	<strong>Message</strong><br/>
	'.$message.'<br/>
    Cheers,<br/>
    Research Paper Web Team.
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
    <a href="" target="_blank">
    <img src="https://www.researchpaperweb.com/assets/img/facebook.png" width="50" />
    </a>
    </td>
    <td width="15"></td>
    <td valign="center" style="padding:5px;">
    <a href="" target="_blank">
    <img src="https://www.researchpaperweb.com/assets/img/gplus.png" width="40"/>
    </a>
    </td>
    <td width="15"></td>
    <td valign="center" style="padding:5px;">
    <a href="" target="_blank">
    <img src="https://www.researchpaperweb.com/assets/img/twitter.png" width="40" />
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
            $post = array('from' => 'admin@researchpaperweb.com',
        'fromName' => 'Research Paper Web',
        'apikey' => '8a715aeb-3703-40e9-a0ef-3d59e205dc66',
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

}

$_SESSION['info'] = "Thank you for contacting Research Paper Web, your message has been sent";
header("location:../contact.php");
} 

}else{

$_SESSION['err'] = "an error occured during processing, try again later";
header("location:../contact.php");
}
?>