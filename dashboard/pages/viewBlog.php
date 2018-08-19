<?php
include("connect.php");
include("session.php");

if (isset($_GET['url'])) {

    $url            = $_GET['url'];
    $sql            = "SELECT * FROM blogs WHERE blog_url = '$url'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $id               = $row['id'];
    $blog_title       = $row['blog_title'];
    $meta_description = $row['meta_description'];
    $header           = $row['header'];
    $blog_content     = $row['blog_content'];
    $time             = $row['time'];
    $show             = $row['show'];

} else{
    $_SESSION["msg"]="blog contents cound not be feteched from the system";
    // header("location:blog");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Blog | <?php echo $blog_title; ?></title>

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
              <div class="col-lg-12">

                <h3 class="page-header"><?php echo $header; ?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "blog.php">Blogs</a></small>
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
            <div class="panel panel-success">
                <div class="panel-heading">     
                    
                <form method="POST" action="php/blog/process.php?id=<?=$id?>" >
                    <button class="btn btn-success" name = "edit_blog" style="font-size: 14px;">
                        Edit
                        <i class="fa fa-edit"></i>
                    </button>
    
                <?php
                if ($show == "no") {
                    echo '
                    <button class="btn btn-primary" name = "set_visible_blog" style="font-size: 14px;">
                        Set Visible
                        <i class="fa fa-eye"></i>
                    </button>
                    ';
                } else{

                    echo '
                    <button class="btn btn-warning" name = "set_invisible_blog" style="font-size: 14px;">
                        Set Invisible
                        <i class="fa fa-eye-slash"></i>
                    </button>
                    ';
                }

                ?>

                <button class="btn btn-danger" name = "delete_blog" style="font-size: 14px;">
                    Delete Blog
                    <i class="fa fa-trash"></i>
                </button>
            </form>
                </div>
                <div class="panel-body">
                    <p><?php 
                    if (empty($blog_content)) {
                        echo "No content to display";
                    }else{
                    echo $blog_content; 
                    }
                    ?></p>
                </div>
                <div class="panel-footer">
                    <span><strong>Posted at:</strong> <?php echo $time;?> GMT</span>
                </div>
            </div>

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
