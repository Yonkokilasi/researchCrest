<?php
include("connect.php");
include("session.php");
if (isset($_GET['token'])) {
$id_fd = $_GET['token'];
} else{
$id = NULL;    
}

$sql_fd 		= "SELECT * FROM `feedback` WHERE id = '$id_fd'";
$result_fd 	= mysqli_query($Con, $sql_fd);
$row_fd		= mysqli_fetch_assoc($result_fd);
$content_fd 	= $row_fd['content'];
$title_fd 		= $row_fd['title'];
$id_fd 		= $row_fd['id'];
$username_fd 	= $row_fd['username'];
$status_fd 	= $row_fd['status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">  <link rel="shortcut icon" href="../img/icon.png" />

<title><?php echo $title_fd ?></title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
            <div class="col-lg-12">
                <h3 class="page-header">View Feedback: # <?php echo $id_fd;?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Home</a> / <a href = "feedback.php">Feedback</a> / View Feedback</small>
                </h3>
            </div>

        <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo $username_fd;?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Feedback</a>
                        </li>
                            <li style="padding-left: 15px">
                            <form method="POST" action="php/feedback?token=<?=$id_fd?>">
                            <?php
                            if ($status_fd == "not visible") {
                            ?>
                                <button type="submit" name="set_visible" class="btn btn-success" >Set Visible</button>
                            <?php
                            } else if ($status_fd == "visible") {
                            ?>    
                            <button type="submit" name="set_invisible" class="btn btn-danger">Set Invisible</button>
                            <?php
                            }
                            ?>
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                        <hr/>
                        <div class="alert2 alert-info">                        
                        <strong><?php echo $title_fd;?></strong><br/>
                        <?php echo $content_fd;?><br/>
                        </div>
                    </div>
                    </div>
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

</body>
</html>
