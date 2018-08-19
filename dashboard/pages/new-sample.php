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

    <title>New sample | Research Paper Web</title>

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
                    <form method="POST" action="php/sample/submit.php">
                            
                    <div style="margin-bottom: 1rem">
                    <input type="text" name="topic" class = "form-control" placeholder="Sample Topic" required="required">
                    </div>

                    <div style="margin-bottom: 1rem">
                    <input type="text" name="meta" class = "form-control" placeholder="Meta Description" required="required">
                    </div>

                    <div style="margin-bottom: 1rem">
                    <input type="text" name="url" class = "form-control" placeholder="Sample URL" required="required">
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >
                    <input type="text" name="pages" class = "form-control" placeholder="Pages" required="required" maxlength="2">
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >                
                    <select name="urgency" class="form-control" required>
                        <option selected disabled>Urgency</option>
                        <option value="8 Hours">8 Hours</option>
                        <option value="12 Hours">12 Hours</option>
                        <option value="1 Day">1 Day</option>
                        <option value="2 Days">2 Days</option>
                        <option value="3 Days">3 Days</option>
                        <option value="5 Days">5 Days</option>
                        <option value="7 Days">7 Days</option>
                        <option value="10 Days">10 Days</option>
                        <option value="14 Days">14 Days</option>
                        <option value="30 Days">30 Days</option>
                    </select>
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >
                    <select name="level" class="form-control" required>
                        <option selected disabled>Academic level</option>
                        <option value="High School">High School</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Masters">Masters</option>
                        <option value="Doctoral">Doctoral</option>
                    </select>
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >
                    <select name="subject" class="form-control" required>
                        <option selected disabled>Subject Area</option>
                        <option >Admission/Application Essay</option>
                        <option >Annotated Bibliography</option>
                        <option >Article</option>
                        <option >Assignment</option>
                        <option >Book Report/Review</option>
                        <option >Case Study</option>
                        <option >Coursework</option>
                        <option >Dissertation</option>
                        <option >Dissertation Chapter - Abstract</option>
                        <option >Dissertation Chapter - Introduction Chapter</option>
                        <option >Dissertation Chapter - Literature Review</option>
                        <option >Dissertation Chapter - Methodology</option>
                        <option >Dissertation Chapter - Results</option>
                        <option >Dissertation Chapter - Discussion</option>
                        <option >Dissertation Chapter - Hypothesis</option>
                        <option >Dissertation Chapter - Conclusion Chapter</option>
                        <option >Editing</option>
                        <option >Essay</option>
                        <option >Formatting</option>
                        <option >Lab Report</option>
                        <option >Math Problem</option>
                        <option >Movie Review</option>
                        <option >Personal Statement</option>
                        <option >PowerPoint Presentation plain</option>
                        <option >PowerPoint Presentation with accompanying text</option>
                        <option >Proofreading</option>
                        <option >Paraphrasing</option>
                        <option >Research Paper</option>
                        <option >Research Proposal</option>
                        <option >Scholarship Essay</option>
                        <option >Speech/Presentation</option>
                        <option >Statistics Project</option>
                        <option >Term Paper</option>
                        <option >Thesis</option>
                        <option >Thesis Proposal</option>
                    </select>
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >
                    <select name="style" class="form-control" required>
                        <option selected disabled>Paper Style</option>
                        <option value="MLA">MLA</option>
                        <option value="APA">APA</option>
                        <option value="Harvard">Harvard</option>
                        <option value="Chicago / Turabian">Chicago / Turabian</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>

                    <div style="margin-bottom: 1rem; max-width: 50%;" >
                    <input type="text" name="sources" class="form-control" placeholder="Sources" required="required" maxlength="2">
                    </div>

                    <div style="margin-bottom: 1rem">                
                    <textarea name="content" placeholder="Your content here"></textarea>
                    </div>

                    <div style="margin: 0 1rem 0 1rem;">                
                    <button type="submit" name="submit_sample" class="btn btn-primary pull-right">Create Sample</button>
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
