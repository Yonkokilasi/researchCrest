<?php
include("connect.php");
include("session.php");
if (isset($_GET['id'])) {

    $id             = $_GET['id'];
    $sql            = "SELECT * FROM seo WHERE id = '$id'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $id             = $row['id'];
    $page_column    = $row['page_column'];
    $url            = $row['url'];
    $url_name       = $row['url_name'];
    $meta           = $row['meta'];
    $title          = $row['title'];
    $header_2       = $row['header_2'];
    $header_1       = $row['header_1'];
    $content_1      = $row['content_1'];
    $content_2      = $row['content_2'];
    $content_3      = $row['content_3'];
    $content_4      = $row['content_4'];

} else{
    $_SESSION["msg"]="sample contents cound not be feteched from the system";
    // header("location:sample");
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

    <title>Edit Page | Research Paper Web</title>

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
                <h3 class="page-header">Edit sample
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / sample Posts</small>
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
                    <form method="POST" action="php/seo/edit.php?id=<?=$id?>" style="padding-left: 30px">
                            <table width="95%">
                                <tr>
                                    <td>
                                        COLUMN
                                    </td>
                                    <td>
                                        <select class="form-control" name="page_column">
                                            <option selected value="<?php echo $page_column;?>"><?php echo $page_column." - <strong>current</strong>"; ?></option>
                                            <option value="Column One">Column One</option>
                                            <option value="Column Two">Column Two</option>
                                            <option value="Column Three">Column Three</option>
                                            <option value="Column Four">Column Four</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        URL NAME
                                    </td>
                                    <td>
                                        <input type="text" name="url_name" class = "form-control" required="required"
                                        value="<?php echo $url_name; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        URL
                                    </td>
                                    <td>
                                        <input type="text" name="url" class = "form-control" required="required"
                                        value="<?php echo $url; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        META DESCRIPTION
                                    </td>
                                    <td>
                                        <input type="text" name="meta" class = "form-control" required="required"
                                        value="<?php echo $meta; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        PAGE TITLE
                                    </td>
                                    <td>
                                        <input type="text" name="title" class = "form-control" required="required" value="<?php echo $title; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        HEADER ONE
                                    </td>
                                    <td>
                                        <input type="text" name="header_1" class = "form-control" required="required"
                                        value="<?php echo $header_1; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        HEADER TWO
                                    </td>
                                    <td>
                                        <input type="text" name="header_2" class = "form-control" required="required"
                                        value="<?php echo $header_2; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="content_1" placeholder="Your content here">
                                            <?php echo $content_1; ?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="content_2" placeholder="Your content here">
                                            <?php echo $content_2; ?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="content_3" placeholder="Your content here">
                                            <?php echo $content_3; ?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="content_4" placeholder="Your content here">
                                            <?php echo $content_4; ?>
                                        </textarea>
                                    </td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <button type="submit" name="submit_seo" class="btn btn-primary btn-lg">Save Page</i></button>
                            <p style="padding-bottom: 5rem;">&nbsp;</p>
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
