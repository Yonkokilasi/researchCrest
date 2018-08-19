<?php
include("connect.php");
include("session.php");
if (isset($_GET['id'])) {

    $id             = $_GET['id'];
    $sql            = "SELECT * FROM blogs WHERE id = '$id'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $blog_title       = $row['blog_title'];
    $meta_description = $row['meta_description'];
    $header           = $row['header'];
    $blog_url         = $row['blog_url'];
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
       height: 300,
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Header 1', block: 'h1'},
            {title: 'Header 2', block: 'h2'},
            {title: 'Header 3', block: 'h3'},
            {title: 'Header 4', block: 'h4'},
            {title: 'Header 5', block: 'h5'},
            {title: 'Header 6', block: 'h6'}
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
                <h3 class="page-header">Edit Blog
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
                    <form method="POST" action="php/blog/edit.php?id=<?=$id?>" style="padding-left: 30px">
                            <table width="95%">
                                <tr>
                                    <td>
                                        Blog Title
                                    </td>
                                    <td>
                                        <input type="text" name="blog_title" class = "form-control" style="border-radius: 5px" placeholder="Blog Title" width="100%" required="required"
                                        value="<?php echo $blog_title; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Meta Description
                                    </td>
                                    <td>
                                        <input type="text" name="meta_description" class = "form-control" style="border-radius: 5px" placeholder="Meta Description" width="100%" required="required" value="<?php echo $meta_description; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Header
                                    </td>
                                    <td>
                                        <input type="text" name="header" class = "form-control" style="border-radius: 5px" placeholder="Header" width="100%" required="required"
                                        value="<?php echo $header; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Blog URL
                                    </td>
                                    <td>
                                        <input type="text" name="blog_url" class = "form-control" style="border-radius: 5px" placeholder="Blog Url" width="100%" required="required"
                                        value="<?php echo $blog_url; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="blog_content" placeholder="Your content here">
                                            <?php echo $blog_content; ?>
                                        </textarea>
                                    </td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <button type="submit" name="submit_blog" class="btn btn-primary pull-right">Save <i class="fa fa-save"></i></button>
                </div>
                </form>
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
