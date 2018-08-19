<?php
include("../connect.php");
include("../session.php");

if (isset($_POST['assign'])) {
	$orderId 	= mysqli_real_escape_string($Con, $_POST['orderId']);
	$writerId 	= mysqli_real_escape_string($Con, $_POST['writerId']);

  $sql    = "SELECT reg_id FROM `sessions` WHERE user_session = '$session_id';";
  $query  = mysqli_query($Con, $sql); 
  $raw    = mysqli_fetch_assoc($query); 
  $reg_id = $raw['reg_id'];

	mysqli_autocommit($Con,false);

	$sql = ("UPDATE `order` 
	SET `order`.requestWriter 	= '$writerId'
	WHERE `order`.orderId 		= '$orderId' ");

$query=mysqli_query($Con, $sql) or mysql_error();

$sql12 = ("DELETE FROM `bids` WHERE `bids`.orderId = '$orderId'");

$query12=mysqli_query($Con, $sql12) or mysql_error(); 

$sql1 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
		VALUES (NULL, '$writerId', '', 'writer', 'You have been assigned order # $orderId, please confirm', 'not viewed')");

$query1=mysqli_query($Con, $sql1) or mysql_error();

#Email here
$date2          = date('d M Y H:i:s A');

  $sql_x            = "SELECT email, user_name FROM registration WHERE reg_id = '$writerId'";
  $query_x          = mysqli_query($Con, $sql_x);
  $row_x            = mysqli_fetch_assoc($query_x);
  $account_email2  = $row_x['email'];
  $user_name2      = $row_x['user_name'];

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
    You have recieved a new notification from researchpaperweb.com as follows<br/>
    <strong>Item:</strong> Order #'.$orderId.' <br/>
    <strong>Incident:</strong> You have been assigned order # '.$orderId.', please log in to review and confirm<br/>
    <p>&nbsp;</p>
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

 if ($query and $query1 and $send_mail and $query12) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Writer has been successfully assigned";
	header("location:../posted.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../posted.php");
  }

  mysqli_close($Con);
	
}else{
    $_SESSION['msg']="Bad url request";
	header("location:../posted.php?");
}

?>