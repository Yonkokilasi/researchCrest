<?php
include("connect.php");
include("session.php");

if (isset($_GET['url'])) {

    $url            = $_GET['url'];
    $sql            = "SELECT * FROM samples WHERE sample_url = '$url'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $id             = $row['id'];
    $topic          = $row['topic'];
    $meta           = $row['meta'];
    $pages          = $row['pages'];
    $urgency        = $row['urgency'];
    $sources        = $row['sources'];
    $style          = $row['style'];
    $content        = $row['content'];
    $level          = $row['level'];
    $subject        = $row['subject'];
    $time           = $row['time'];
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

    <title><?php echo $sample_title; ?></title>

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
                    
                <form method="POST" action="php/sample/process.php?id=<?=$id?>" >
                    <button class="btn btn-success" name = "edit_sample" style="font-size: 14px;">
                        Edit
                        <i class="fa fa-edit"></i>
                    </button>

                <button class="btn btn-danger" name = "delete_sample" style="font-size: 14px;">
                    Delete Sample
                    <i class="fa fa-trash"></i>
                </button>
            </form>
                </div>
                <div class="panel-body">
                    <p><?php
                    echo "
                    <table>
                        <tr>
                        <td>Topic</td> <td>- $topic</td>
                        </tr>
                        <tr>
                        <td>Meta Description</td> <td>- $meta</td>
                        </tr>
                        <tr>
                        <td>Sample URL</td> <td>- $url</td>
                        </tr>
                        <tr>
                        <td>No. of pages</td> <td>- $pages</td>
                        </tr>
                        <tr>
                        <td>Urgency</td> <td>- $urgency</td>
                        </tr>
                        <tr>
                        <td>Level</td> <td>- $level</td>
                        </tr>
                        <tr>
                        <td>Subject</td> <td>- $subject</td>
                        </tr>
                        <tr>
                        <td>Style</td> <td>- $style</td>
                        </tr>
                        <tr>
                        <td>No. of sources</td> <td>- $sources</td>
                        </tr>
                    </table>
                    ";
                    if (empty($content)) {
                        echo "No content to display";
                    }else{
                    echo $content; 
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
