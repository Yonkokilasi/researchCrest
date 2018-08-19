<?php
include("connect.php");
include("session.php");
$sql2 = ("UPDATE `notifications` 
    SET `notifications`.status      = 'viewed'     
    WHERE `notifications`.userType     = 'Support'");
$query2=mysqli_query($Con, $sql2) or mysql_error();

include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;

$statement = "`notifications` WHERE userType = 'Support'";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Notification(s) | Research Paper Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/table-styler-view.css" type="text/css" media="screen, print"/>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, print"/>
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
                    <div class="col-lg-12">
                        <h3 class="page-header">System Notifications
                        <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / Notification(s)</small>
                        </h3>
                    <?php
                    if(isset($_SESSION["msg"]))
                        {
                        $msg = $_SESSION["msg"];
                        echo "
                                <div class='alert alert-danger alert-dismissable'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    $msg
                                </div>
                        ";
                        unset($_SESSION["msg"]);
                        }
                    ?>
                     <div class="alert2 alert-warning" style="font-size: 16px; color: red">
                        These notifications are sent to your email
                    </div>                        
                    </div>
                                    <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            $sql = "SELECT * FROM `notifications` WHERE userType = 'Support' ORDER BY id DESC LIMIT {$startpoint} , {$limit}";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            $notification = $row['notification'];
                            $id = $row['id'];
                            if ($notification != null) {
                            echo "
                            <div class='alert2 alert-success alert-dismissable'>
                                <a class = 'pull-right' href = 'deletenot?id=$id'>&times;</a>
                                 <div style = 'word-wrap: break-word'>
                                 $notification</div> 
                            </div>
                            ";
                            }else{
                            echo "
                            <div class='alert alert-success alert-dismissable'>
                                <a class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                                 you dont have any notification 
                            </div>
                            ";

                            }

                            }
                            ?>
                            <?php
                            echo pagination($statement,$limit,$page);
                            ?>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                      
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
    $(document).ready(function(){
    setTimeout(function(){        
            $.ajax({
                type : 'post',
                url : 'php/delete_notifications.php', 
         });
    }, 5000);    
    });
    </script>

</body>

</html>
