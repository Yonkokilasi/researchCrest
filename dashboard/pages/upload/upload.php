<?php
date_default_timezone_set("GMT");
$id         = $_GET['id'];
$file_addr  = $_GET['file_addr'];
include("classes/easy_upload/upload_class.php"); //classes is the map where the class file is stored
    
$upload = new file_upload();
$date2          = date('d M Y H:i:s A');

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "localhost";
$database = "r_p_w";
$username = "Genius";
$password = "8xpdh-pckkg";
$Con = mysqli_connect($hostname, $username, $password,$database) or trigger_error(mysql_error(),E_USER_ERROR); 
/*if ($Con){
$conn = mysql_select_db($database) or trigger_error(mysql_error(),E_USER_ERROR);

}*/

$upload->upload_dir = '../../../assets/order/';
$upload->extensions = array('.png', '.jpg', '.zip', '.pdf', '.doc', '.docx', '.dot', '.docm', '.dotx', '.dotm', '.docb', '.xls', '.xlt', 'xlm', '.xlsx', '.xlsm', '.xltx', '.xltm', '.xlsb', '.xla', '.xlam', '.xll', '.xlw', '.ppt', 'pot', '.pps', '.pptx', '.pptm', 'potx', '.potm', '.ppam', '.ppsx', '.sldx', '.sldm', '.ACCDB', '.ACCDE', '.ACCDT', '.ACCRD','.pub', '.zip', '.rar'); // specify the allowed extensions here
$upload->rename_file = false;
//$file_id = date('YmdHis');

if(!empty($_FILES)) {
    $upload->the_temp_file  = $_FILES['userfile']['tmp_name'];
    $upload->the_file       = $_FILES['userfile']['name'];
    //Check for unique name
    $name                   = preg_replace('/\s+/', '_', $_FILES['userfile']['name']);
    $actual_name            = pathinfo($name,PATHINFO_FILENAME);
    $original_name          = $actual_name;
    $extension              = pathinfo($name, PATHINFO_EXTENSION);
    $target                 = "../../../assets/order/";

    $i = 1;
    while(file_exists($target.$actual_name.".".$extension)){       
        $actual_name        = $original_name.$i;
        $upload->the_file   = $actual_name.".".$extension;
        $i++;
    }
    //Check for unique name
    $upload->description    = $_POST['description'];
    $upload->size           = ceil($_FILES['userfile']['size']/1024);
    $upload->orderId        = $id;
    $upload->http_error     = $_FILES['userfile']['error'];
    $upload->do_filename_check = 'y'; // use this boolean to check for a valid filename
    $time                   = date('Y-m-d H:i:s');  

    if ($upload->upload()){

        mysqli_query($Con, "INSERT INTO `file_table` (`id`, `file_name`, `size`, `description`, `orderId`, `uploaded_by` , `time`) VALUES (NULL, '$upload->file_copy','$upload->size', '$upload->description', $upload->orderId,'Support', CURRENT_TIMESTAMP);");

        if ($file_addr == "progress") {
        $sql        = "SELECT * FROM `order` WHERE orderId = '$id'";
        $query      = mysqli_query($Con, $sql);
        $row        = mysqli_fetch_assoc($query);
        $writerId   = $row['writerId'];
        mysqli_query($Con, "INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '$writerId', '', 'writer', 'Dear writer, new files have been uploaded for order # $id, please keep up with the order', 'not viewed')");
        } else if ($file_addr == "revision") {
        $sql        = "SELECT * FROM `order` WHERE orderId = '$id'";
        $query      = mysqli_query($Con, $sql);
        $row        = mysqli_fetch_assoc($query);
        $writerId   = $row['writerId'];
        mysqli_query($Con, "INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '$writerId', '', 'writer', 'Dear writer, new files have been uploaded for order # $id (on revision), please keep up with the order', 'not viewed')");
        }
        
        $sql        = "SELECT * FROM `order` WHERE orderId = '$id'";
        $query      = mysqli_query($Con, $sql);
        $row        = mysqli_fetch_assoc($query);
        $clientId   = $row['clientId'];
        $writerId   = $row['writerId'];

        $sql8       = "SELECT * FROM `registration` WHERE reg_id = '$clientId'";
        $result8    = mysqli_query($Con, $sql8);
        $row8       = mysqli_fetch_assoc($result8);
        $email      = mysqli_real_escape_string($Con, $row8['email']);
        $user_name  = mysqli_real_escape_string($Con, $row8['user_name']);

        $to       = $email;
        $name     = $user_name;
        $subject  = 'New system notification on '.$date2.' GMT';
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
    <strong>Item:</strong> New file(s) on order #'.$id.' <br/>
    <strong>Incident:</strong> New files have been uploaded on order '.$id.' by admin<br/>
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




        $sql_8      = "SELECT * FROM `registration` WHERE reg_id = '$writerId'";
        $result_8   = mysqli_query($Con, $sql_8);
        $row_8      = mysqli_fetch_assoc($result_8);
        $email_8        = mysqli_real_escape_string($Con, $row_8['email']);
        $user_name_8  = mysqli_real_escape_string($Con, $row_8['user_name']);

        $to       = $email_8;
        $name     = $user_name_8;
        $subject  = 'New system notification on '.$date2.' GMT';
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
    <strong>Item:</strong> New file(s) on order #'.$id.' <br/>
    <strong>Incident:</strong> New files have been uploaded on order '.$id.' by admin<br/>
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





        echo '<div id="status">success</div>';
        echo '<div id="message">'. $upload->file_copy .' Successfully Uploaded</div>';
        //return the upload file
        echo '<div id="uploadedfile">'. $upload->file_copy .'</div>';
        
    } else {
        
        echo '<div id="status">failed</div>';
        echo '<div id="message">'. $upload->show_error_string() .'</div>';
        
    }
}
?>