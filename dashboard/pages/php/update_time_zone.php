<?php
date_default_timezone_set("GMT");
session_start();
include_once('../connect.php');
include("../session.php");

	$sql = "SELECT email, user_name FROM registration WHERE reg_id = '$session_id'";
    $query = mysqli_query($Con, $sql);
    $row    = mysqli_fetch_assoc($query);
    $email = $row['email'];
    $user_name = $row['user_name'];

if (!isset($_POST['time_zone'])) {
	
	$_SESSION['msg'] = "Kindly use the POST form";
	header('Location:../profile.php');

} elseif (isset($_POST['time_zone'])) {

	$zone = mysqli_real_escape_string($Con, $_POST['zone_time']);
	if ($zone == "-720") {
    $zone_name = "[UTC - 12] Baker Island Time";
	}elseif ($zone == "-660") {
	    $zone_name = "[UTC - 11] Niue Time, Samoa Standard Time";
	}elseif ($zone == "-600") {
	    $zone_name = "[UTC - 10] Hawaii-Aleutian Standard Time, Cook Island Time";
	}elseif ($zone == "-570") {
	    $zone_name = "[UTC - 9:30] Marquesas Islands Time";
	}elseif ($zone == "-540") {
	    $zone_name = "[UTC - 9] Alaska Standard Time, Gambier Island Time";
	}elseif ($zone == "-480") {
	    $zone_name = "[UTC - 8] Pacific Standard Time";
	}elseif ($zone == "-420") {
	    $zone_name = "[UTC - 7] Mountain Standard Time";
	}elseif ($zone == "-360") {
	    $zone_name = "[UTC - 6] Central Standard Time";
	}elseif ($zone == "-300") {
	    $zone_name = "[UTC - 5] Eastern Standard Time";
	}elseif ($zone == "-270") {
	    $zone_name = "[UTC - 4:30] Venezuelan Standard Time";
	}elseif ($zone == "-240") {
	    $zone_name = "[UTC - 4] Atlantic Standard Time";
	}elseif ($zone == "-210") {
	    $zone_name = "[UTC - 3:30] Newfoundland Standard Time";
	}elseif ($zone == "-180") {
	    $zone_name = "[UTC - 3] Amazon Standard Time, Central Greenland Time";
	}elseif ($zone == "-120") {
	    $zone_name = "[UTC - 2] Fernando de Noronha Time, South Georgia &amp; the South Sandwich Islands Time";
	}elseif ($zone == "-60") {
	    $zone_name = "[UTC - 1] Azores Standard Time, Cape Verde Time, Eastern Greenland Time";
	}elseif ($zone == "0") {
	    $zone_name = "[UTC] Western European Time, Greenwich Mean Time";
	}elseif ($zone == "60") {
	    $zone_name = "[UTC + 1] Central European Time, West African Time";
	}elseif ($zone == "120") {
	    $zone_name = "[UTC + 2] Eastern European Time, Central African Time";
	}elseif ($zone == "180") {
	    $zone_name = "[UTC + 3] Moscow Standard Time, Eastern African Time";
	}elseif ($zone == "210") {
	    $zone_name = "[UTC + 3:30] Iran Standard Time";
	}elseif ($zone == "240") {
	    $zone_name = "[UTC + 4] Gulf Standard Time, Samara Standard Time";
	}elseif ($zone == "270") {
	    $zone_name = "[UTC + 4:30] Afghanistan Time";
	}elseif ($zone == "300") {
	    $zone_name = "[UTC + 5] Pakistan Standard Time, Yekaterinburg Standard Time";
	}elseif ($zone == "330") {
	    $zone_name = "[UTC + 5:30] Indian Standard Time, Sri Lanka Time";
	}elseif ($zone == "345") {
	    $zone_name = "[UTC + 5:45] Nepal Time";
	}elseif ($zone == "360") {
	    $zone_name = "[UTC + 6] Bangladesh Time, Bhutan Time, Novosibirsk Standard Time";
	}elseif ($zone == "390") {
	    $zone_name = "[UTC + 6:30] Cocos Islands Time, Myanmar Time";
	}elseif ($zone == "420") {
	    $zone_name = "[UTC + 7] Indochina Time, Krasnoyarsk Standard Time";
	}elseif ($zone == "480") {
	    $zone_name = "[UTC + 8] Chinese Standard Time, Australian Western Standard Time, Irkutsk Standard Time";
	}elseif ($zone == "525") {
	    $zone_name = "[UTC + 8:45] Southeastern Western Australia Standard Time";
	}elseif ($zone == "540") {
	    $zone_name = "[UTC + 9] Japan Standard Time, Korea Standard Time, Chita Standard Time";
	}elseif ($zone == "570") {
	    $zone_name = "[UTC + 9:30] Australian Central Standard Time";
	}elseif ($zone == "600") {
	    $zone_name = "[UTC + 10] Australian Eastern Standard Time, Vladivostok Standard Time";
	}elseif ($zone == "630") {
	    $zone_name = "[UTC + 10:30] Lord Howe Standard Time";
	}elseif ($zone == "660") {
	    $zone_name = "[UTC + 11] Solomon Island Time, Magadan Standard Time";
	}elseif ($zone == "690") {
	    $zone_name = "[UTC + 11:30] Norfolk Island Time";
	}elseif ($zone == "720") {
	    $zone_name = "[UTC + 12] New Zealand Time, Fiji Time, Kamchatka Standard Time";
	}elseif ($zone == "765") {
	    $zone_name = "[UTC + 12:45] Chatham Islands Time";
	}elseif ($zone == "780") {
	    $zone_name = "[UTC + 13] Tonga Time, Phoenix Islands Time";
	}elseif ($zone == "840") {
	    $zone_name = "[UTC + 14] Line Island Time";
	}else{
	    $zone_name = "No timezone selected";
	}
	mysqli_autocommit($Con,false);
	$sql = ("UPDATE `registration` 
		SET	`registration`.zone     = '$zone'
		WHERE `registration`.reg_id 	= '$session_id' ");

		$query=mysqli_query($Con, $sql) or mysql_error(); 

		$date2 = date('d M Y H:i:s A');

		//Email here
	  $to       = $email;
	  $name     = $user_name;
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
	  <strong>Item:</strong> <i>Timezone</i><br/>
	  <strong>incident: </strong> <i> Your timezone has been adjusted to '.$zone_name.'<br/></i><br/>
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
				
		        $result=curl_exec ($ch);
		        curl_close ($ch);
				
		        //echo $result;	
		}
		catch(Exception $ex){
			echo $ex->getMessage();
		}


		if ($query and $result) {

		mysqli_query($Con,"COMMIT");

		$_SESSION['info']= "Timezone succesfully updated";
		header("location:../profile.php");
		} else {        
		mysqli_query($Con,"ROLLBACK");

		$_SESSION['err']="An error occured during processing, please try again";
		header("location:../profile.php");
		}
		mysqli_close($Con);

}else{
	    $_SESSION['err'] = "unknown request";
		header('Location:../profile.php');
}
?>