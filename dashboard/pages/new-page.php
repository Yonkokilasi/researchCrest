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

    <title>New page | Research Paper Web</title>

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
            {title: 'Header 1', block: 'h1'},
            {title: 'Header 2', block: 'h2'},
            {title: 'Header 3', block: 'h3'},
            {title: 'Header 4', block: 'h4'},
            {title: 'Header 5', block: 'h5'},
            {title: 'Header 6', block: 'h6'},
        ]
    }); 
  	</script>
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
                <h3 class="page-header">Create new sample
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / Create new sample</small>
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
                <div style="max-width: 80%;">
                    <form method="POST" action="php/seo/submit.php">

                    <!-- <div style="margin-bottom: 1rem; max-width: 50%;" >                
                    <select name="page_column" class="form-control" required>
                        <option selected disabled>Select Column</option>
                        <option value="Column One">Column One</option>
                        <option value="Column Two">Column Two</option>
                        <option value="Column Three">Column Three</option>
                        <option value="Column Four">Column Four</option>
                    </select>
                    </div> -->
                            
                    <div style="margin-bottom: 1rem">
                    <input type="text" name="page_column" class = "form-control" value="Column One" required="required" readonly>
                    </div>

                    <div style="margin-bottom: 1rem">
                    <input type="text" name="url" class = "form-control" placeholder="Page URL" required="required">
                    </div>

                    <div style="margin-bottom: 1rem">
                    <input type="text" name="url_name" class = "form-control" placeholder="Name" required="required" value="<i class='fa fa-random'></i>">
                    </div>

                    <div style="margin-bottom: 1rem">
                    <input type="text" name="meta" class = "form-control" placeholder="META Description" required="required">
                    </div>

                    <div style="margin-bottom: 1rem;" >
                    <input type="text" name="title" class = "form-control" placeholder="Page Title" required="required">
                    </div>

                    <div style="margin-bottom: 1rem;" >
                    <input type="text" name="header_1" class = "form-control" placeholder="Header One" required="required">
                    </div>

                    <div style="margin-bottom: 1rem;" >
                    <input type="text" name="header_2" class = "form-control" placeholder="Header Two" required="required">
                    </div>

                    <div style="margin-bottom: 1rem">                
                    <textarea name="content_1" placeholder="Content One">Section One</textarea>
                    </div>

                    <div style="margin-bottom: 1rem">                
                    <textarea name="content_2" placeholder="Content Two">Section Two</textarea>
                    </div>

                    <div style="margin-bottom: 1rem">                
                    <textarea name="content_3" placeholder="Content Three">Section Three</textarea>
                    </div>

                    <div style="margin-bottom: 1rem">                
                    <textarea name="content_4" placeholder="Content Four">Section Four</textarea>
                    </div>

                    <div style="margin: 0 1rem 0 1rem;">                
                    <button type="submit" name="submit_page" class="btn btn-primary pull-right">Create Page</button>
                    </div>

                </form>
                <!-- /.col-lg-12 -->
                </div>
            </div>
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
