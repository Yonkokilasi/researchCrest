<?php
include("connect.php");
include("session.php");

//Pagination
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;

$statement = "`messaging` WHERE sender = 'Support' OR recipient = 'Support'";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex"> 
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Message(s) | Research Paper Web</title>

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
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/B_blue.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .records {
            width: 510px;
            margin: 5px;
            padding:2px 5px;
            border:1px solid #B6B6B6;
        }
        
        .record {
            color: #474747;
            margin: 5px 0;
            padding: 3px 5px;
            background:#E6E6E6;  
            border: 1px solid #B6B6B6;
            cursor: pointer;
            letter-spacing: 2px;
        }
        .record:hover {
            background:#D3D2D2;
        }
        
        
        .round {
            -moz-border-radius:8px;
            -khtml-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius:8px;    
        }    
        
        p.createdBy{
            padding:5px;
            width: 510px;
            font-size:15px;
            text-align:center;
        }
        p.createdBy a {color: #666666;text-decoration: none;}        
    </style>
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
                    <div class="col-md-12">
                        <h3 class="page-header">Messages
                        <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / Message(s)</small>
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
                                <form method="POST" action="send-msg.php">
                                <table class="table-modal">
                                    <tr>
                                        <th>Recipient</th>
                                        <th>Order Id</th>
                                    </tr>
                                    <tr>
                                        <td>
                                        <select name="recipient" class="form-control">
                                        <option>Writer</option>
                                        <option>Student</option>
                                        </select>
                                    </td>
                                    <td>
                                    <?php
                                      $sql = "SELECT orderId FROM `order` WHERE orderStatus != 'paid' AND orderStatus != 'done'";
                                      $result = mysqli_query($Con, $sql);
                                      echo "<select name='orderId' class='form-control' id='orderId'>";
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
                                    <input type="submit" class="btn btn-primary " name="submit-msg" value="Send">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    <button class='btn btn-primary btn-outline' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'> Create new message </button>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">                        
                        <?php
                        $sql2    = "SELECT * FROM `messaging` WHERE sender = 'Support' OR recipient = 'Support' ORDER BY id DESC LIMIT {$startpoint} , {$limit};";
                        $result2 = mysqli_query($Con, $sql2);
                        $chec2 = mysqli_num_rows($result2);
                        while($row2=mysqli_fetch_assoc($result2)){
                        $id         = $row2['id'];
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
                        //select time and append timezone                                    
                        $hour = $zone;

                        $time2 = $hour.'minute';

                        $date = $row2['time']; 

                        $add_time = date("Y-m-d H:i:s", strtotime($date . $time2));
                        //select time and append timezone
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $id ?>">
                                    <?php
                                    if ($sender != "Support" && $status == "unread") {
                                    ?>
                                    <small><b style="color: black;">
                                        <?php 
                                        if ($sender == $session_id) {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == $session_id) {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$add_time.")"?>
                                    </b></small>
                                    <small class="pull-right"><strong style="color: orange;">Order #<?php echo $orderId; ?></strong></small></a>
                                    <?php
                                    } else{
                                    ?>
                                    <small>
                                        <?php 
                                        if ($sender == $session_id) {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == $session_id) {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$add_time.")"?>
                                    </small>
                                    <small  class="pull-right">Order #<?php echo $orderId; ?></small></a>
                                    <?php
                                    }
                                    ?>
                                </h4>
                            </div>
                            <div id="<?php echo $id ?>" class="panel-collapse collapse view-message">
                                <div class="panel-body" style="word-wrap: break-word" >
                                <b><?php echo $subject?></b><br/>
                                <?php echo nl2br($message)?>

                                <?php
                                if ($sender != "Support") {
                                echo "<a href = 'reply_msg.php?id=$id' class='btn btn-success pull-right'>Reply</a>";
                                }
                                ?>
                                 </div>
                                </div>
                             </div>
                            <?php
                            }
                            ?>       
                            </div>
                       <?php
                        echo pagination($statement,$limit,$page);
                        ?>
                        </ul>                            
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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


</body>
</html>
