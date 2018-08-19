<?php
include("connect.php");
include("session.php");
$id = $_GET['id'];

$sql2    = "SELECT * FROM `messaging` WHERE id = '$id'";
$result2 = mysqli_query($Con, $sql2);
$row2=mysqli_fetch_assoc($result2);
$id         = mysqli_real_escape_string($Con, $row2['id']);
$orderId    = mysqli_real_escape_string($Con, $row2['orderId']);
$sender     = mysqli_real_escape_string($Con, $row2['sender']);
if ($sender == "Support") {
    $sender2 = "Me";
} else{

$sql8     =   "SELECT user_type FROM `registration` WHERE reg_id = '$sender'";
$result8  =   mysqli_query($Con, $sql8);
$row8     =   mysqli_fetch_assoc($result8);
$user_type    =   mysqli_real_escape_string($Con, $row8['user_type']);
if ($user_type == "writer") {
    $sender2 = "Writer";
} else if ($user_type == "client") {
    $sender2 = "Student";
}

}
$recipient  = mysqli_real_escape_string($Con, $row2['recipient']);
if ($recipient == "Support") {
 $recipient2 = "Me";
}else{
$sql9     =   "SELECT user_type FROM `registration` WHERE reg_id = '$recipient'";
$result9  =   mysqli_query($Con, $sql9);
$row9     =   mysqli_fetch_assoc($result9);
$user_type    =   mysqli_real_escape_string($Con, $row9['user_type']);
if ($user_type == "writer") {
    $recipient2 = "Writer";
} else if ($user_type == "client") {
    $recipient2 = "Student";
}
}
$subject    = mysqli_real_escape_string($Con, $row2['subject']);
$message    = mysqli_real_escape_string($Con, $row2['message']);
$status     = mysqli_real_escape_string($Con, $row2['status']);
$time       = date('Y-m-d H:i:s');

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Reply Message | Research Paper Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/table-styler-view.css" type="text/css" media="screen, print"/>
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, print"/>
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
                        <h3 class="page-header">Reply Message
                        <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / <a href="messages.php">Message(s)</a> / Reply Message</small>
                        </h3>
                    </div>
                <div class="col-lg-12">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $id ?>">
                                    <?php
                                    if ($status == "unread") {
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
                                    </small>
                                    <small  class="pull-right">Order #<?php echo $orderId; ?></small></a>
                                    <?php
                                    }
                                    ?>
                                </h4>
                            </div>
                            <form method="POST" action="php/reply.php?id=<?=$id?>">
                            <div id="<?php echo $id ?>" class="panel-collapse collapse in">
                                <div class="panel-body" style="word-wrap: break-word" >
                                
                                <div class="msg_a">
                                <b><?php echo $subject?></b><br/>
                                <?php echo nl2br($message)?>
                                </div>

                                <div class="msg_footer">
                                    <textarea name="message" class="form-control" placeholder="Your message here"></textarea>
                                </div>

                                <button name="submit_msg" class='btn btn-success pull-right'>Reply</button>

                                </div>
                            </form>
                            </div>
                          </div>                            
                         </div>
                        </div>
                        <!-- .panel-body -->
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
