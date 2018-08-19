<?php
include("connect.php");
include("session.php");
if (isset($_GET['id'])) {

    $id             = $_GET['id'];
    $sql            = "SELECT * FROM samples WHERE id = '$id'";
    $result         = mysqli_query($Con, $sql);
    $row            = mysqli_fetch_assoc($result);
    $topic          = $row['topic'];
    $meta           = $row['meta'];
    $sample_url     = $row['sample_url'];
    $pages          = $row['pages'];
    $urgency        = $row['urgency'];
    $sources        = $row['sources'];
    $style          = $row['style'];
    $content        = $row['content'];
    $level          = $row['level'];
    $subject        = $row['subject'];
    // $show           = $row['show'];

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

    <title>sample | Research Paper Web</title>

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
                    <form method="POST" action="php/sample/edit.php?id=<?=$id?>" style="padding-left: 30px">
                            <table width="95%">
                                <tr>
                                    <td>
                                        Topic
                                    </td>
                                    <td>
                                        <input type="text" name="topic" class = "form-control" required="required"
                                        value="<?php echo $topic; ?>">
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
                                        Sample URL
                                    </td>
                                    <td>
                                        <input type="text" name="sample_url" class = "form-control" required="required"
                                        value="<?php echo $sample_url; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No. of pages
                                    </td>
                                    <td>
                                        <input type="text" name="pages" class = "form-control" required="required" value="<?php echo $pages; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Urgency
                                    </td>
                                    <td>
                                        <input type="text" name="urgency" class = "form-control" required="required"
                                        value="<?php echo $urgency; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Paper subject
                                    </td>
                                    <td>
                                        <input type="text" name="subject" class = "form-control" required="required"
                                        value="<?php echo $subject; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Academic level
                                    </td>
                                    <td>
                                        <input type="text" name="level" class = "form-control" required="required"
                                        value="<?php echo $level; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Paper style
                                    </td>
                                    <td>
                                        <input type="text" name="style" class = "form-control" required="required"
                                        value="<?php echo $style; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No. of sources
                                    </td>
                                    <td>
                                        <input type="text" name="sources" class = "form-control" required="required"
                                        value="<?php echo $sources; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="content" placeholder="Your content here">
                                            <?php echo $content; ?>
                                        </textarea>
                                    </td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <button type="submit" name="submit_sample" class="btn btn-primary pull-right">Save <i class="fa fa-save"></i></button>
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
