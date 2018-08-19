<?php
include("connect.php");
include("session.php");
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 5;
$startpoint = ($page * $limit) - $limit;

$statement = "`blogs`";
$cr = "SELECT * FROM `blogs`";
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

    <title>Blog | Research Paper Web</title>

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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    }); 
  	</script>
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
                <h3 class="page-header">Blog Posts
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / Blog Posts</small>
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
            <form method="POST" action="newBlog.php">
            <button class="btn btn-outline btn-success" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus-circle"></i>
                Create a new blog
            </button>
            </form>
            <p>&nbsp;</p>
	        <?php
	        $sql = "SELECT * FROM `blogs` ORDER BY id DESC LIMIT {$startpoint} , {$limit};";
	        $result = mysqli_query($Con, $sql);
	        $chec2 = mysqli_num_rows($result);
	        while($row=mysqli_fetch_assoc($result)){
	           $id          =  $row['id'];
               $content     =  $row['blog_content'];
	           $content2 	= substr($content, 0, 900);
	           $header 	    =  $row['header'];
	           $time 	    =  $row['time'];
	           $blog_url 	=  $row['blog_url'];
	           $show 		=  $row['show'];

	        ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">     
                            <?php echo $header;?>
                            <?php
                            if ($show == "no") {
                            	echo "<span class = 'label label-default pull-right'>invisible</span>";
                            } else{
                            	echo "<span class = 'label label-primary pull-right'>visible</span>";
                            }

                            ?>   
                        </div>
                        <div class="panel-body">
                            <p><?php 
                            if (empty($content)) {
                                echo "No content to display";
                            }else{
                            echo $content2; 
                            }
                            ?></p>
                        </div>
                        <div class="panel-footer">
                        
                        <span style = "float: right"><strong>Posted at:</strong> <?php echo $time;?> GMT</span>
                        <form method="POST" action="viewBlog.php?url=<?=$blog_url?>" >
                        <button class="btn btn-success" name = "view_blog" style="font-size: 14px;">
                            Continue Reading
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
