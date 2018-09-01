<?php
include("connect.php");
include("session.php");
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 5;
$startpoint = ($page * $limit) - $limit;

$statement = "`seo`";
$cr = "SELECT * FROM `seo`";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>SEO Pages | Research Paper Web</title>

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
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
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
              <div class="col-lg-12">
                <h3 class="page-header">SEO Pages
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / SEO Pages</small>
                </h3>
                <?php
        if(isset($_SESSION["msg"]))
            {
            $msg = $_SESSION["msg"];
            echo "
                    <div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        $msg
                    </div>
            ";
            unset($_SESSION["msg"]);
            }
        ?>
            </div>
            </div>
            <!-- /.container-fluid -->
            
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
            <form method="POST" action="new-page.php">
            <button class="btn btn-outline btn-success" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus-circle"></i>
                Upload new page
            </button>
            </form>
            <p>&nbsp;</p>
	        <?php
	        $sql = "SELECT * FROM `seo` ORDER BY id DESC LIMIT {$startpoint} , {$limit};";
	        $result = mysqli_query($Con, $sql);
	        $chec2 = mysqli_num_rows($result);
	        while($row=mysqli_fetch_assoc($result)){
	           $id          =  $row['id'];
               $url_name    =  $row['url_name'];
	           $title 	    =  $row['title'];
	           $header_1 	=  $row['header_1'];
	           $url 	    =  $row['url'];
	           $meta 		=  $row['meta'];

	        ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">     
                            <?php echo $url_name;?>   
                        </div>
                        <div class="panel-body">
                            <p>
                            <?php 
                            echo "<strong>TITLE&nbsp;&nbsp;</strong>".$title."<br/>";
                            echo "<strong>HEADER&nbsp;&nbsp;</strong>".$header_1."<br/>";
                            echo "<strong>URL NAME&nbsp;&nbsp;</strong>".$url_name."<br/>";
                            echo "<strong>META DESCRIPTION&nbsp;&nbsp;</strong>".$meta."<br/>";
                            ?>
                            </p>
                        </div>
                        <div class="panel-footer">
                        <form method="POST" action="view-seo.php?url=<?=$url?>" >
                        <button class="btn btn-success" name = "view_blog" style="font-size: 14px;">
                            View Page
                            <i class="fa fa-caret-right"></i>
                        </button>
                        </form>
                        </div>
                    </div>
                <?php
		        }
		        ?>

		        <?php
		        echo pagination($statement,$limit,$page);
		        ?>
                </div>
                <!-- /.col-lg-12 -->

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