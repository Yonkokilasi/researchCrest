<?php
date_default_timezone_set("GMT");
include("connect.php");

    if (isset($_POST['new_cus'])) {
     //Order Details
    $clientId       = strtoupper(uniqid());
    $token_id       = sha1($clientId);
    $paperSubject   = mysqli_real_escape_string($Con, $_POST['paperSubject']);
    $paperTopic     = mysqli_real_escape_string($Con, $_POST['paperTopic']);
    $paperStyle     = mysqli_real_escape_string($Con, $_POST['format']);
    $new_spacing    = mysqli_real_escape_string($Con, $_POST['spacing']);
    
    if ($new_spacing == "2") {
        $spacing = "Single Spacing";
    } elseif ($new_spacing =="1") {
        $spacing = "Double Spacing";
    } else{
        $spacing = "Double Spacing";
    }
    $new_typeOfWork     = mysqli_real_escape_string($Con, $_POST['typeOfWork']);
if ($new_typeOfWork == "11.000001") {
        $typeOfWork = "Admission/Application Essay";
    } else if ($new_typeOfWork == "11.000002") {
        $typeOfWork = "Annotated Bibliography";
    }else if ($new_typeOfWork == "11.000003") {
        $typeOfWork = "Article";
    }else if ($new_typeOfWork == "11.000004") {
        $typeOfWork = "Assignment";
    }else if ($new_typeOfWork == "11.000005") {
        $typeOfWork = "Book Report/Review";
    }else if ($new_typeOfWork == "11.000006") {
        $typeOfWork = "Case Study";
    }else if ($new_typeOfWork == "11.000007") {
        $typeOfWork = "Coursework";
    }else if ($new_typeOfWork == "11.000008") {
        $typeOfWork = "Dissertation";
    }else if ($new_typeOfWork == "11.000009") {
        $typeOfWork = "Dissertation Chapter - Abstract";
    }else if ($new_typeOfWork == "11.0000011") {
        $typeOfWork = "Dissertation Chapter - Introduction Chapter";
    }else if ($new_typeOfWork == "11.0000012") {
        $typeOfWork = "Dissertation Chapter - Literature Review";
    }else if ($new_typeOfWork == "11.0000013") {
        $typeOfWork = "Dissertation Chapter - Methodology";
    }else if ($new_typeOfWork == "11.0000014") {
        $typeOfWork = "Dissertation Chapter - Results";
    }else if ($new_typeOfWork == "11.0000015") {
        $typeOfWork = "Dissertation Chapter - Discussion";
    }else if ($new_typeOfWork == "11.0000016") {
        $typeOfWork = "Dissertation Chapter - Hypothesis";
    }else if ($new_typeOfWork == "11.0000016") {
        $typeOfWork = "Dissertation Chapter - Conclusion Chapter";
    }else if ($new_typeOfWork == "11.0000018") {
        $typeOfWork = "Editing";
    }else if ($new_typeOfWork == "11.0000019") {
        $typeOfWork = "Essay";
    }else if ($new_typeOfWork == "11.00000111") {
        $typeOfWork = "Formatting";
    }else if ($new_typeOfWork == "11.00000112") {
        $typeOfWork = "Lab Report";
    }else if ($new_typeOfWork == "11.00000113") {
        $typeOfWork = "Math Problem";
    }else if ($new_typeOfWork == "11.00000114") {
        $typeOfWork = "Movie Review";
    }else if ($new_typeOfWork == "11.00000115") {
        $typeOfWork = "Personal Statement";
    }else if ($new_typeOfWork == "11.00000116") {
        $typeOfWork = "PowerPoint Presentation plain";
    }else if ($new_typeOfWork == "11.00000117") {
        $typeOfWork = "PowerPoint Presentation with accompanying text";
    }else if ($new_typeOfWork == "11.00000118") {
        $typeOfWork = "Proofreading";
    }else if ($new_typeOfWork == "11.00000119") {
        $typeOfWork = "Paraphrasing";
    }else if ($new_typeOfWork == "11.000001111") {
        $typeOfWork = "Research Paper";
    }else if ($new_typeOfWork == "11.000001112") {
        $typeOfWork = "Research Proposal";
    }else if ($new_typeOfWork == "11.000001113") {
        $typeOfWork = "Scholarship Essay";
    }else if ($new_typeOfWork == "11.000001114") {
        $typeOfWork = "Speech/Presentation";
    }else if ($new_typeOfWork == "11.000001115") {
        $typeOfWork = "Statistics Project";
    }else if ($new_typeOfWork == "11.000001116") {
        $typeOfWork = "Term Paper";
    }else if ($new_typeOfWork == "11.000001117") {
        $typeOfWork = "Thesis";
    }else if ($new_typeOfWork == "11.000001118") {
        $typeOfWork = "Thesis Proposal";
    } else{
        $typeOfWork = "Essay";
    }

    $new_deadline       = mysqli_real_escape_string($Con, $_POST['deadline']); 
    if ($new_deadline == "1.2") {
    $date = new DateTime(); 
    $date->modify('+6 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "1.1") {
    $date = new DateTime(); 
    $date->modify('+12 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "1.0") {
    $date = new DateTime(); 
    $date->modify('+24 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.95") {
    $date = new DateTime(); 
    $date->modify('+48 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.9") {
    $date = new DateTime(); 
    $date->modify('+72 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.85") {
    $date = new DateTime(); 
    $date->modify('+96 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.8") {
    $date = new DateTime(); 
    $date->modify('+120 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.75") {
    $date = new DateTime(); 
    $date->modify('+168 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.7") {
    $date = new DateTime(); 
    $date->modify('+336 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.65") {
    $date = new DateTime(); 
    $date->modify('+720 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    }else {
    $date = new DateTime(); 
    $date->modify('+336 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    }



    $new_level          = mysqli_real_escape_string($Con, $_POST['level']);
    if ($new_level == "1.6") {
        $level = "High School";
    } else if ($new_level == "1.7") {
        $level = "Undergraduate";
    } else if ($new_level == "1.8") {
        $level = "Masters";
    } else if ($new_level == "1.9") {
        $level = "Doctoral";
    } else {
        $level = "Undergraduate";
    }

    $numberOfPages  = mysqli_real_escape_string($Con, $_POST['pages']);
    $numberOfsources= mysqli_real_escape_string($Con, $_POST['sources']);
    $digital        = mysqli_real_escape_string($Con, $_POST['digitalSources']);
    if ($digital == "14") {
        $digitalSources = "Yes";
        } else if ($digital == "0") {
        $digitalSources = "No";
        } else {
        $digitalSources = "invalid";
        }    
    $total          = mysqli_real_escape_string($Con, $_POST['amount']);
    $instructions   = mysqli_real_escape_string($Con, $_POST['instructions']);
    $specificWriter = mysqli_real_escape_string($Con, $_POST['specificWriter']);
    if (!empty($specificWriter )) 
    {
      $specificWriter = $specificWriter;

    $sql7     = "SELECT * FROM `registration` WHERE regId = '$specificWriter'";
    $result7  = mysqli_query($Con, $sql7);
    $row7     = mysqli_fetch_assoc($result7);
    $email7   = mysqli_real_escape_string($Con, $row7['email']);

        } 
        else{       
        $specificWriter = "writerId";
     }

    $datePosted     = date('Y-m-d h:i:s');
    
    //Registration Details
    $payment    = mysqli_real_escape_string($Con, $_POST['payment_mode']);
    if ($payment == "0") {
        $paymentMode = "Paypal";
    } else if ($payment == "1") {
        $paymentMode = "Skrill";
    }else{
        $paymentMode == "Not Specified";
    }

    $email      = mysqli_real_escape_string($Con, $_POST['email']);
    $Pass       = mysqli_real_escape_string($Con, $_POST['password']);
    $Pass2      = mysqli_real_escape_string($Con, $_POST['password_Match']);
    $promoCode  = mysqli_real_escape_string($Con, $_POST['promoCode']);

    if ($Pass != $Pass2) {

      session_start();
      $_SESSION['err']="passwords don't match...";
      header("location:../post-order.php");
      
    } else if($Pass == $Pass2){

    $date = date('Y-m-d H:i:s');
    $date2 = date('d M Y H:i:s A');
    $password     = md5(sha1($Pass));

    $_SESSION['order'] = uniqid();

    $order        = $_SESSION['order'];
    $user_session = uniqid();
    $ip_address   = $_SERVER['REMOTE_ADDR'];
    // $login_time   = "not set";
    $logout_time  = "not set";

    // Set autocommit to off
    mysqli_autocommit($Con,FALSE);

    //Send Mail Here
    $date2      = date('d M Y H:i:s A');

      $to       = $email;
      $name     = $email;
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
      <p>Dear Customer,</p>
      <p>&nbsp;</p>  
      Welcome and thank you for trusting us with your work. We guarantee the best support and quality of answers. 
      We are determined to walk with you through your success journey and we hope you are too!
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
      <a href="https://www.facebook.com/HomeworkCrestcom-538673042930041/?ref=hl" target="_blank">
      <img src="https://www.researchpaperweb.com/assets/img/facebook.png" width="50" />
      </a>
      </td>
      <td width="15"></td>
      <td valign="center" style="padding:5px;">
      <a href="https://plus.google.com/113966469486496394717" target="_blank">
      <img src="https://www.researchpaperweb.com/assets/img/gplus.png" width="40"/>
      </a>
      </td>
      <td width="15"></td>
      <td valign="center" style="padding:5px;">
      <a href="https://twitter.com/homeworkcrest" target="_blank">
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

    //Insert Into Database

  $sql = ("INSERT INTO `registration` (`reg_id`, `user_name`, `email`, `mobile_number`, `user_type`, `online_status`, `zone`, `activation_status`, `account_status`, `registration_date`, `password`, `activation_code`) VALUES ('$clientId', 'client', '$email', 'not set', 'client', 'offline', '', 'active', 'active', '$date', '$password', 'not set')");
 
  $query = mysqli_query($Con,$sql) or mysql_error();

  $sql2 =  ("INSERT INTO `order` (`orderId`, `clientId`, `writerId`, `paperSubject`, `paperTopic`, `paperStyle`, `spacing`, `typeOfWork`, `deadline`, `level`, `numberOfPages`, `numberOfsources`, `digitalSources`, `total`, `instructions`, `datePosted`, `dateCompleted`, `orderStatus`, `dateDue`, `requestWriter`, `paymentMode`, `transactionCode`) VALUES (NULL, '$clientId', '', '$paperSubject', '$paperTopic', '$paperStyle', '$spacing', '$typeOfWork', '$deadline', '$level', '$numberOfPages', '$numberOfsources', '$digitalSources', '$total', '$instructions', '$date', '', 'unpaid', '', '$specificWriter', '$paymentMode', '$order');");

  $query2 = mysqli_query($Con,$sql2) or mysql_error();

$sql3 = ("INSERT INTO `sessions` (`id`, `reg_id`, `email`, `user_session`, `ip_address`, `login_time`, `logout_time`) VALUES (NULL, '$clientId', '$email', '$user_session', '$ip_address', '$date', '$logout_time')");

$query3=mysqli_query($Con,$sql3) or mysql_error();

$sql4 = ("INSERT INTO `r_p_w`.`profilepict` (`id`, `regId`, `name`) VALUES (NULL, '$clientId', '2.jpg')");

$query4=mysqli_query($Con,$sql4) or mysql_error();

    if ($query and $query2 and $query3 and $query4 and $result) {

      $rowx = mysqli_fetch_assoc(mysqli_query($Con, "SELECT orderId FROM `order` WHERE transactionCode = '$order'"));
      $orderIdx = $rowx['orderId'];

      $sql5 =  ("INSERT INTO `fines` (`id`, `order_id`, `writer_id`, `client_id`, `initial_amount`, `past_ETR`, `revision`, `disputed`, `final_amount`) VALUES (NULL, '$orderIdx', '', '', NULL, '', '', '', '');");

        $query5 = mysqli_query($Con,$sql5) or mysql_error();

        mysqli_query($Con,"COMMIT");
        
        $reg_id             = $clientId;   
        $reg_sess = time().sha1(md5($clientId));
        session_id($reg_sess);
        session_start();        
        $_SESSION['id']     = $clientId;
        $_SESSION['logged'] = true;
        $_SESSION['user']   = $user_session;
        $_SESSION['order']  = $orderIdx;
        session_write_close();
        // header("location:../account/");

        header("location:../paypal/checkout.php?orderId=$orderIdx&amount=$total&clientId=$clientId");
    } else {        
    mysqli_query($Con,"ROLLBACK");
    session_start();
    $_SESSION['err']="An error occured during processing, please try again";
    header("location:../post-order.php");
            
    }

    // Close connection
    mysqli_close($Con);

    }

    }else
    
    if (isset($_POST['return_cus'])) {
       
    $clientId       = mysqli_real_escape_string($Con, $_POST['regId']);
    $paperSubject   = mysqli_real_escape_string($Con, $_POST['paperSubject']);
    $paperTopic     = mysqli_real_escape_string($Con, $_POST['paperTopic']);
    $paperStyle     = mysqli_real_escape_string($Con, $_POST['format']);
    $new_spacing    = mysqli_real_escape_string($Con, $_POST['spacing']);
    if ($new_spacing == "2") {
        $spacing = "Single Spacing";
    } elseif ($new_spacing =="1") {
        $spacing = "Double Spacing";
    } else{
        $spacing = "Double Spacing";
    }
    $new_typeOfWork     = mysqli_real_escape_string($Con, $_POST['typeOfWork']);
    if ($new_typeOfWork == "11.000001") {
        $typeOfWork = "Admission/Application Essay";
    } else if ($new_typeOfWork == "11.000002") {
        $typeOfWork = "Annotated Bibliography";
    }else if ($new_typeOfWork == "11.000003") {
        $typeOfWork = "Article";
    }else if ($new_typeOfWork == "11.000004") {
        $typeOfWork = "Assignment";
    }else if ($new_typeOfWork == "11.000005") {
        $typeOfWork = "Book Report/Review";
    }else if ($new_typeOfWork == "11.000006") {
        $typeOfWork = "Case Study";
    }else if ($new_typeOfWork == "11.000007") {
        $typeOfWork = "Coursework";
    }else if ($new_typeOfWork == "11.000008") {
        $typeOfWork = "Dissertation";
    }else if ($new_typeOfWork == "11.000009") {
        $typeOfWork = "Dissertation Chapter - Abstract";
    }else if ($new_typeOfWork == "11.0000011") {
        $typeOfWork = "Dissertation Chapter - Introduction Chapter";
    }else if ($new_typeOfWork == "11.0000012") {
        $typeOfWork = "Dissertation Chapter - Literature Review";
    }else if ($new_typeOfWork == "11.0000013") {
        $typeOfWork = "Dissertation Chapter - Methodology";
    }else if ($new_typeOfWork == "11.0000014") {
        $typeOfWork = "Dissertation Chapter - Results";
    }else if ($new_typeOfWork == "11.0000015") {
        $typeOfWork = "Dissertation Chapter - Discussion";
    }else if ($new_typeOfWork == "11.0000016") {
        $typeOfWork = "Dissertation Chapter - Hypothesis";
    }else if ($new_typeOfWork == "11.0000016") {
        $typeOfWork = "Dissertation Chapter - Conclusion Chapter";
    }else if ($new_typeOfWork == "11.0000018") {
        $typeOfWork = "Editing";
    }else if ($new_typeOfWork == "11.0000019") {
        $typeOfWork = "Essay";
    }else if ($new_typeOfWork == "11.00000111") {
        $typeOfWork = "Formatting";
    }else if ($new_typeOfWork == "11.00000112") {
        $typeOfWork = "Lab Report";
    }else if ($new_typeOfWork == "11.00000113") {
        $typeOfWork = "Math Problem";
    }else if ($new_typeOfWork == "11.00000114") {
        $typeOfWork = "Movie Review";
    }else if ($new_typeOfWork == "11.00000115") {
        $typeOfWork = "Personal Statement";
    }else if ($new_typeOfWork == "11.00000116") {
        $typeOfWork = "PowerPoint Presentation plain";
    }else if ($new_typeOfWork == "11.00000117") {
        $typeOfWork = "PowerPoint Presentation with accompanying text";
    }else if ($new_typeOfWork == "11.00000118") {
        $typeOfWork = "Proofreading";
    }else if ($new_typeOfWork == "11.00000119") {
        $typeOfWork = "Paraphrasing";
    }else if ($new_typeOfWork == "11.000001111") {
        $typeOfWork = "Research Paper";
    }else if ($new_typeOfWork == "11.000001112") {
        $typeOfWork = "Research Proposal";
    }else if ($new_typeOfWork == "11.000001113") {
        $typeOfWork = "Scholarship Essay";
    }else if ($new_typeOfWork == "11.000001114") {
        $typeOfWork = "Speech/Presentation";
    }else if ($new_typeOfWork == "11.000001115") {
        $typeOfWork = "Statistics Project";
    }else if ($new_typeOfWork == "11.000001116") {
        $typeOfWork = "Term Paper";
    }else if ($new_typeOfWork == "11.000001117") {
        $typeOfWork = "Thesis";
    }else if ($new_typeOfWork == "11.000001118") {
        $typeOfWork = "Thesis Proposal";
    } else{
        $typeOfWork = "Essay";
    }

    $new_deadline       = mysqli_real_escape_string($Con, $_POST['deadline']); 
    if ($new_deadline == "1.2") {
    $date = new DateTime(); 
    $date->modify('+6 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "1.1") {
    $date = new DateTime(); 
    $date->modify('+12 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } else if ($new_deadline == "1.0") {
    $date = new DateTime(); 
    $date->modify('+24 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.95") {
    $date = new DateTime(); 
    $date->modify('+48 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.9") {
    $date = new DateTime(); 
    $date->modify('+72 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.85") {
    $date = new DateTime(); 
    $date->modify('+96 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.8") {
    $date = new DateTime(); 
    $date->modify('+120 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.75") {
    $date = new DateTime(); 
    $date->modify('+168 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.7") {
    $date = new DateTime(); 
    $date->modify('+336 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    } elseif ($new_deadline == "0.65") {
    $date = new DateTime(); 
    $date->modify('+720 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    }else {
    $date = new DateTime(); 
    $date->modify('+336 hour'); 
    $deadline = $date->format('Y-m-d H:i:s');
    }

    $new_level          = mysqli_real_escape_string($Con, $_POST['level']);
    if ($new_level == "1.6") {
        $level = "High School";
    } else if ($new_level == "1.7") {
        $level = "Undergraduate";
    } else if ($new_level == "1.8") {
        $level = "Masters";
    } else if ($new_level == "1.9") {
        $level = "Doctoral";
    } else {
        $level = "Undergraduate";
    }

    $numberOfPages  = mysqli_real_escape_string($Con, $_POST['pages']);
    $numberOfsources= mysqli_real_escape_string($Con, $_POST['sources']);
    $digital        = mysqli_real_escape_string($Con, $_POST['digitalSources']);
    if ($digital == "14") {
        $digitalSources = "Yes";
        } else if ($digital == "0") {
        $digitalSources = "No";
        } else {
        $digitalSources = "invalid";
        }    
    $total          = mysqli_real_escape_string($Con, $_POST['amount']);
    $instructions   = mysqli_real_escape_string($Con, $_POST['instructions']);
    $specificWriter = mysqli_real_escape_string($Con, $_POST['specificWriter']);
    if (!empty($specificWriter )) 
    {
      $specificWriter = $specificWriter;
        } 
        else{       
        $specificWriter = "writerId";
     }    
    $date     = date('Y-m-d h:i:s');
    
    //Login Details
        //Registration Details
    $payment    = mysqli_real_escape_string($Con, $_POST['payment_mode2']);
    if ($payment == "0") {
        $paymentMode = "Paypal";
    } else if ($payment == "1") {
        $paymentMode = "Skrill";
    }else{
        $paymentMode == "Not Specified";
    }
    $Email2     = mysqli_real_escape_string($Con, $_POST['email2']);
    $Pass2      = mysqli_real_escape_string($Con, $_POST['password2']);
    $promoCode  = mysqli_real_escape_string($Con, $_POST['promoCode']);
    $Password2  = md5(sha1($Pass2));

    $exe=mysqli_query($Con,"select  * from registration where password='$Password2' and email='$Email2'");
    $row= mysqli_fetch_array($exe);
    if(mysqli_num_rows(mysqli_query($Con,"select  * from registration where password='$Password2' and email='$Email2'" ))<0)
    {
        session_start();
        $_SESSION['err']="Wrong email or account pasword, use the correct credentials please...";
        header("location:../post-order.php");
    } else{

    // Set autocommit to off
    mysqli_autocommit($Con,FALSE);  

    $exe=mysqli_query($Con,"select  * from registration where password='$Password2' and email='$Email2'");
    $row= mysqli_fetch_array($exe);
    $clientId = $row['reg_id'];
    $email    = $row['email'];
    
    $_SESSION['order']  = uniqid();
    $user_session       = uniqid();
    $ip_address         = $_SERVER['REMOTE_ADDR'];
    $logout_time        = "not set";
    $date               = date('Y-m-d H:i:s');
    $order              = $_SESSION['order'];

    $sql2 =  ("INSERT INTO `order` (`orderId`, `clientId`, `writerId`, `paperSubject`, `paperTopic`, `paperStyle`, `spacing`, `typeOfWork`, `deadline`, `level`, `numberOfPages`, `numberOfsources`, `digitalSources`, `total`, `instructions`, `datePosted`, `dateCompleted`, `orderStatus`, `dateDue`, `requestWriter`, `paymentMode`, `transactionCode`) VALUES (NULL, '$clientId', '', '$paperSubject', '$paperTopic', '$paperStyle', '$spacing', '$typeOfWork', '$deadline', '$level', '$numberOfPages', '$numberOfsources', '$digitalSources', '$total', '$instructions', '$date', '', 'unpaid', '', '$specificWriter', '$paymentMode', '$order');");

    $query2 = mysqli_query($Con,$sql2) or mysql_error();

    $query3 = mysqli_query($Con, "UPDATE `sessions` 
    SET `sessions`.user_session   = '$user_session',
      `sessions`.ip_address       = '$ip_address',
      `sessions`.login_time       = '$date'  
    WHERE   `sessions`.email      = '$email'");

    if ($query2 and $query3) {

      $rowx = mysqli_fetch_assoc(mysqli_query($Con, "SELECT orderId FROM `order` WHERE transactionCode = '$order'"));
      $orderIdx = $rowx['orderId'];
      
      $sql5 =  ("INSERT INTO `fines` (`id`, `order_id`, `writer_id`, `client_id`, `initial_amount`, `past_ETR`, `revision`, `disputed`, `final_amount`) VALUES (NULL, '$orderIdx', '', '', NULL, '', '', '', '');");

        $query5 = mysqli_query($Con,$sql5) or mysql_error();
        mysqli_query($Con,"COMMIT");
            
        $reg_id             = $clientId;   
        $reg_sess = time().sha1(md5($clientId));
        session_id($reg_sess);
        session_start();        
        $_SESSION['id']     = $clientId;
        $_SESSION['logged'] = true;
        $_SESSION['user']   = $user_session;
        $_SESSION['order']  = $orderIdx;
        session_write_close();
        // header("location:../account/");

        header("location:../paypal/checkout.php?orderId=$orderIdx&amount=$total&clientId=$clientId");

    } else {        
        mysqli_query($Con,"ROLLBACK");
        session_start();
        $_SESSION['err']="An error occured during processing, please try again";
        header("location:../post-order.php");
            
    }
    }

    } else{
        session_start();
        $_SESSION['err']="An error occured during processing, please try again";
        header("location:../post-order.php");
    }
?>