<?php
include("connect.php");
include("session.php");

if (isset($_GET['url'])) {

    $url            = $_GET['url'];
    $sql            = "SELECT * FROM seo WHERE url = '$url'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $id             = $row['id'];
    $page_column         = $row['page_column'];
    $url_name       = $row['url_name'];
    $meta           = $row['meta'];
    $title          = $row['title'];
    $header_2       = $row['header_2'];
    $header_1       = $row['header_1'];
    $content_1      = $row['content_1'];
    $content_2      = $row['content_2'];
    $content_3      = $row['content_3'];
    $content_4      = $row['content_4'];
    // $show           = $row['show'];

} else{
    $_SESSION["msg"]="sample contents cound not be feteched from the system";
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

    <title><?php echo $title; ?></title>

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

                <h3 class="page-header"><?php echo $title; ?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "samples.php">samples</a></small>
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
                    
                <form method="POST" action="php/seo/process.php?id=<?=$id?>" >
                    <button class="btn btn-success" name = "edit_seo" style="font-size: 14px;">
                        Edit Page
                        <i class="fa fa-edit"></i>
                    </button>

                <button class="btn btn-danger" name = "delete_seo" style="font-size: 14px;">
                    Delete Page
                    <i class="fa fa-trash"></i>
                </button>
            </form>
                </div>
                <div class="panel-body">
                    <p><?php
                    echo "
                    <table>
                        <tr>
                        <td>URL</td> <td>- $url</td>
                        </tr>
                        <tr>
                        <td>URL Name</td> <td>- $url_name</td>
                        </tr>
                        <tr>
                        <td>Meta Description</td> <td>- $meta</td>
                        </tr>
                        <tr>
                        <td>Title</td> <td>- $title</td>
                        </tr>
                        <tr>
                        <td>Header One</td> <td>- $header_1</td>
                        </tr>
                        <tr>
                        <td>Header Two</td> <td>- $header_2</td>
                        </tr>
                    </table>
                    ";
                    echo $content_1."<br/>";
                    echo $content_2."<br/>";
                    echo $content_3."<br/>";
                    echo $content_4."<br/>";
                    ?></p>
                </div>
                <div class="panel-footer">
                    <span><strong>Posted at:</strong>  GMT</span>
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
