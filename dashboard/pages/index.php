<?php
include("connect.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">  
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Admin | Research Paper Web</title>

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
<style type="text/css">
    .finance-dash{
    overflow: hidden;
    font-size: 2em;
    }
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
                        <h3 class="page-header">Admin Dashboard
                        <small class = "breadcrumb pull-right">Dashboard / </small>
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
                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge available-orders-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="posted.php">
                            <div class="panel-footer">
                                <span class="pull-left">Posted Orders</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge orders-in-progress-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="progress.php">
                            <div class="panel-footer">
                                <span class="pull-left">Orders Progress</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge completed-orders-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="completed.php">
                            <div class="panel-footer">
                                <span class="pull-left">Completed Orders</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-eligible">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge finance-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="finance.php">
                            <div class="panel-footer">
                                <span class="pull-left">PayPal Debits</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>           
                    <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div class="huge order-revision-dash"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="revision.php">
                            <div class="panel-footer">
                                <span class="pull-left">Revision</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div class="huge disputed-orders-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="disputed.php">
                            <div class="panel-footer">
                                <span class="pull-left">Disputes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div class="huge view-notification-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="notifications.php">
                            <div class="panel-footer">
                                <span class="pull-left">New Notification(s)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div class="huge messaging-dash"></div>
                                </div>
                            </div>
                        </div>
                        <a href="messages.php">
                            <div class="panel-footer">
                                <span class="pull-left">New Message(s)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
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
    <script src="scripts.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <?php
          $sql = "SELECT * FROM `notifications` WHERE writerId = '$session_id' AND status = 'not viewed'";
            $result = mysqli_query($Con, $sql);
            $query = mysqli_num_rows($result);
                if ($query > 0) {
         echo '
        <script type="text/javascript">
        $(document).ready( function () {
            reset();
            alertify.success("You have new notification(s)", "", 0);
            return false;
        });
        </script>
        ';
        
        }
    ?>
        
</body>
</html>

<script type="text/javascript">
    $(function() {
    while( $('.finance-dash div').height() > $('.finance-dash').height() ) {
        $('.finance-dash div').css('font-size', (parseInt($('.finance-dash div').css('font-size')) - 1) + "px" );
    }
});
</script>