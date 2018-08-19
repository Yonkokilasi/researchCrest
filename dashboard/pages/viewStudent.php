<?php
include("connect.php");
include("session.php");
$stud_id = $_GET['id'];

$cr_x_p = "SELECT * FROM `profilepict` WHERE regId = '$stud_id'";
$tl_x_p = mysqli_query($Con, $cr_x_p);
$np_x_p = mysqli_fetch_assoc($tl_x_p);
$user_pic = $np_x_p['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">  <link rel="shortcut icon" href="../img/icon.png" />

<title>View Order #<?php echo $stud_id ?> | Research Paper Web</title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, print"/>
<link rel="stylesheet" href="css/table-styler-view.css" type="text/css" media="screen, print"/>

</head>
<body>
<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <!-- /.navbar-header -->   

<?php include('includes/header.php'); ?>
</nav>
<div class="container">
<?php include('includes/sidebar.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Student Id: # <?php echo $stud_id;?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "students.php">Students</a> / View Student</small>
                </h3>
                        <?php
        if(isset($_SESSION["msg"]))
            {
            $msg = $_SESSION["msg"];
            echo "
                    <div class='alert alert-info alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        $msg
                    </div>
            ";
            unset($_SESSION["msg"]);
            }
        ?>
            </div>


                    <!-- //Message -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        New Message
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/messages/sendMsg-student.php">
                                <input type="hidden" name="reg_id" class="form-control" value="<?php echo $stud_id?>" required="required">                                
                                <table class="table-modal">
                                    <tr>
                                        <th>Recipient</th>
                                        <th>Order Id</th>
                                    </tr>
                                    <tr>
                                    <td>
                                    <input type = "text" name="recipient" class="form-control" value="Student" readonly="readonly">
                                    </td>
                                    <td>
                                    <?php
                                      $sql = "SELECT orderId FROM `order` WHERE clientId = '$stud_id'";
                                      $result = mysqli_query($Con, $sql);
                                      echo "<select name='orderId' class='form-control' id='orderId' required>";
                                      while ($row = mysqli_fetch_array($result)) {
                                       echo "<option>" .$row['orderId']."</option>";
                                      }
                                      echo "</select>";
                                       ?>
                                    </td>
                                    </tr>
                                </table>
                                    Subject
                                    <input type="text" name="subject" class="form-control" required="required">
                                    Message
                                    <textarea maxlength="2000" name="message" class="form-control" required="required"></textarea>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="submit-msg-student" value="Send">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>    

        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Student Id: # <?php echo $stud_id;?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Student Details</a>
                        </li>
                        <li style="padding-left: 10px;">
                        <button class="btn btn-success" data-toggle="modal" data-target='#myModalEdit'>
                        <i class="fa fa-edit"></i>
                        Edit Account</button>
                        </li>
                        <li style="padding-left: 10px;">
                        <button class="btn btn-primary" data-toggle="modal" data-target='#myModal'>
                        <i class="fa fa-chat"></i>
                        Send Message</button>
                        </li>
                        <li style="padding-left: 10px;">
                        <form method="POST" name="suspend" action="php/suspendStudent.php?reg_id=<?=$stud_id?>">
                        <?php
                        $sql3    = "SELECT * FROM `registration` WHERE reg_id = '$stud_id'";
                        $result3 = mysqli_query($Con, $sql3);
                        $row3    = mysqli_fetch_assoc($result3);
                        $onlineStatus       = $row3['online_status'];
                        $activationStatus   = $row3['activation_status'];
                        $accountStatus      = $row3['account_status'];

                        if ($onlineStatus == "suspended" and $activationStatus == "suspended" and $accountStatus == "suspended" ) {
                            echo "
                            <button class='btn btn-success' type='submit' name='activateStudent'>
                            <i class='fa fa-trash'></i>
                            Activate Account</button>
                            ";
                        } else{
                            echo "
                            <button class='btn btn-danger' type='submit' name='suspendStudent'>
                            <i class='fa fa-trash'></i>
                            Suspend Account</button>
                            ";
                        }
                        ?>
                        </form>
                        </li>
                        <li style="padding-left: 10px;">
                        <i data-toggle="modal" data-target='#myModalPassword' class="fa fa-key fa-2x"></i>
                        </li>
                        <li style="padding-left: 10px;">
                        <i id="delete_student" class="fa fa-trash text-danger fa-2x"></i>
                        </li>                        
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                        <hr/>
                        <table><tr><td>
                        <div style="padding-right: 50px">
                        <?php
                        if (empty($user_pic)) {
                        ?>
                        <img src="img/user/2.jpg" style="border-radius: 100px; width: 200px">
                        <?php
                        } elseif (!empty($user_pic)) {
                        ?>
                        <img src="../../account/pages/img/user/<?php echo $user_pic ?>" style="border-radius: 100px; width: 200px">
                        <?php
                        }
                        ?>
                        </div>
                        <td>
                        <td>
                        <?php
                            //Posted Orders
                            $sql4    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'not taken'";
                            $result4 = mysqli_query($Con, $sql4);
                            $row4    = mysqli_num_rows($result4);
                            //Orders in Progress
                            $sql5    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'taken'";
                            $result5 = mysqli_query($Con, $sql5);
                            $row5    = mysqli_num_rows($result5);
                            //Orders in Revision
                            $sql6    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'revision'";
                            $result6 = mysqli_query($Con, $sql6);
                            $row6    = mysqli_num_rows($result6);
                            //Disputed Orders
                            $sql7    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'disputed'";
                            $result7 = mysqli_query($Con, $sql7);
                            $row7    = mysqli_num_rows($result7);
                            //Completed Orders
                            $sql8    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'complete'";
                            $result8 = mysqli_query($Con, $sql8);
                            $row8    = mysqli_num_rows($result8);
                            //Approved Orders
                            $sql9    = "SELECT * FROM `order` WHERE clientId = '$stud_id' AND orderStatus = 'done'";
                            $result9 = mysqli_query($Con, $sql9);
                            $row9    = mysqli_num_rows($result9);
    
                        ?>

                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='not taken'?>">
                            <p class="label label-default">Posted Orders: 
                            <i class="fa fa-arrow-right"></i> <?php echo $row4 ?></p></a> <br/>
                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='taken'?>">
                            <p class="label label-default">Orders In progress: 
                            <i class="fa fa-arrow-right"></i> <?php echo $row5 ?></p></a><br/>
                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='revision'?>">
                            <p class="label label-default">Revision:
                            <i class="fa fa-arrow-right"></i> <?php echo $row6 ?></p></a><br/>
                        </td>
                        <td>
                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='disputed'?>">
                            <p class="label label-default">Disputed: 
                            <i class="fa fa-arrow-right"></i> <?php echo $row7 ?></p></a><br/>
                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='complete'?>">
                            <p class="label label-default">Completed: 
                            <i class="fa fa-arrow-right"></i> <?php echo $row8 ?></p><br/>
                            <a href = "viewDet.php?clientId=<?=$stud_id?>&orderStatus=<?='done'?>">
                            <p class="label label-default">Approved: 
                            <i class="fa fa-arrow-right"></i> <?php echo $row9 ?></p></a><br/>
                        </td>
                        </table>
                        <?php
                            $sql = "SELECT * FROM `registration` WHERE reg_id = '$stud_id'";
                            $result = mysqli_query($Con, $sql);
                            $check = mysqli_num_rows($result);
                            if ($check<1) {
                                echo "There are no student details at the moment";
                            }
                            while
                            ($row=mysqli_fetch_assoc($result)){
                            ?>                        
                <table align="center" style="width:100%; font-size: 18px;">
                  <tr>
                      <td><b>Email:</b></td>
                      <td colspan="3"> <?php echo $row['email'];?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Registration Id:</b></td><td> <?php echo $row['reg_id'];?></td>
                    <td><b>user_name:</b></td><td> <?php echo $row['user_name'];?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Online Status:</b></td><td> <?php echo $onlineStatus ;?></td>
                    <td><b>Email Activation:</b></td><td> <?php echo $activationStatus;?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Account Status:</b></td><td> <?php echo $accountStatus;?></td>                                  
                    <td><b>Registration Date:</b></td><td> <?php echo $row['registration_date'];?></td>
                  </tr>
                </table>
                <?php
                }
                ?>
            </div>
        <div class="tab-pane fade in" id="message">
        <!-- .panel-heading -->
                        <div class="panel-body">
                        <div class="panel-group" id="accordion">
                         
                        <hr/>                  
                        <?php
                        $sql2    = "SELECT * FROM `messaging` WHERE orderId = '$orderId' ORDER BY id DESC";
                        $result2 = mysqli_query($Con, $sql2);
                        $chec2 = mysqli_num_rows($result2);
                        while($row2=mysqli_fetch_assoc($result2)){
                        $msgId      = $row2['id'];
                        $orderId    = $row2['orderId'];
                        $sender     = $row2['sender'];
                        $row3 = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `registration` WHERE reg_id = '$sender'"));
                        $user = $row3['user_type'];
                        if ($user == "writer") {
                        $sender2 = "Writer";
                        } else if ($user == "client") {
                            $sender2 = "Student";
                        } else {
                            $sender2 = "Me";
                        }
                        $recipient  = $row2['recipient'];
                        $row4 = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `registration` WHERE reg_id = '$recipient'"));
                        $user = $row4['user_type'];
                        if ($user == "writer") {
                        $recipient2 = "Writer";
                        } else if ($user == "client") {
                            $recipient2 = "Student";
                        } else {
                            $recipient2 = "Me";
                        }
                        $subject    = $row2['subject'];
                        $message    = $row2['message'];
                        $status     = $row2['status'];
                        $time       = $row2['time'];
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $msgId ?>">
                                    <?php
                                    if ($sender != "Support" && $status == "unread") {
                                    ?>
                                    <small><b style="color: black;">
                                        <?php 
                                        if ($sender == "Support") {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$time.")"?>
                                    </b></small>
                                    <small class="pull-right"><strong style="color: orange;">Order #<?php echo $orderId; ?></strong></small></a>
                                    <?php
                                    } else{
                                    ?>
                                    <small>
                                        <?php 
                                        if ($sender == "Support") {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$time.")"?>
                                    </small>
                                    <small  class="pull-right">Order #<?php echo $orderId; ?></small></a>
                                    <?php
                                    }
                                    ?>
                                </h4>
                            </div>
                            <div id="<?php echo $msgId ?>" class="panel-collapse collapse view-message">
                                <div class="panel-body" style="word-wrap: break-word" >
                                <b><?php echo $subject?></b><br/>
                                <?php echo nl2br($message)?>

                                <?php
                                if ($sender != "Support") {
                                echo "<a href = 'reply_msg.php?id=$msgId' class='btn btn-success pull-right'>Reply</a>";
                                }
                                ?>
                                 </div>
                                </div>
                             </div>
                            <?php
                            }
                            ?>       
                            </div>
                        </ul>                            
                        </div>
                        <!-- .panel-body -->                    
                    </div>
                </div>
                </div>
            <!-- Edit Account -->

                        <?php
                            $sql1 = "SELECT * FROM `registration` WHERE reg_id = '$stud_id'";
                            $result1 = mysqli_query($Con, $sql1);
                            $row1=mysqli_fetch_assoc($result1);
                            ?>

                            <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Edit Student Account
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/editAccount.php">
                                    Email
                                    <input type="hidden" name="reg_id" class="form-control" value="<?php echo $stud_id?>" required="required">
                                    <input type="text" name="email" class="form-control" value="<?php echo $row1['email'];?>" required="required">
                                    user_name
                                    <input type="text" name="user_name" class="form-control" value="<?php echo $row1['user_name'];?>" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="edit" value="Save">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
                <!-- /.panel-body -->
				
                        <div class="modal fade" id="myModalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change Password
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/updatePass.php">
                                    Enter Password:
                                    <input type="hidden" name="reg_id" class="form-control" value="<?php echo $stud_id?>" required="required">
                                    <input type="password" name="password" class="form-control" value="" required="required">
                                    Confirm Passowrd:
                                    <input type="password" name="password2" class="form-control" value="" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="submit-pass" value="Save">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
                <!-- /.panel-body -->				
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        </div>      
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- /#page-wrapper -->        
<!-- footer-->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<script src="scripts.js"></script>
<script type="text/javascript">

//Delete Student
$("#delete_student").on( 'click', function () {
    reset();
    alertify.confirm("Are you sure you want to <strong style = 'color:red'>DELETE</strong> this student ?", function (e) {
        if (e) {
            // alertify.success("You've clicked OK");
            window.location.href ='php/delete_student.php?id=<?=$stud_id?>';  
        } else {
            alertify.error("You've clicked Cancel");
        }
    });
    return false;
});
</script>

</body>
</html>
