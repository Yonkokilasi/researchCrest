<?php
include("connect.php");
include("session.php");
// include('pagination/function.php');
// $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
// $limit = 10;
// $startpoint = ($page * $limit) - $limit;

// $statement = "`gen` GROUP BY user_type";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>General notification | Research Paper Web</title>

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
                <h3 class="page-header">General notification(s)
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / General notification</small>
                </h3>
            <?php
            if(isset($_SESSION["err"]))
                {
                $err = $_SESSION["err"];
                echo "
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            $err
                        </div>
                ";
                unset($_SESSION["err"]);
                } else
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

            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    <button class='btn btn-primary btn-outline' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'> New notification </button>

                    <button class='btn btn-danger' style='margin-left: 15px;' data-toggle='modal' data-target='#myModalDelete'> Delete all </button>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion"> 
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
        <tr style="with:100%; background-color: #eeeeee; ">
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        #
        </td>
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        Id
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        Recipient
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        Subject
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        Message
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        Action
        </td>
        </tr>
        <?php
        $sql = "SELECT * FROM gen GROUP BY notification_id";
        $result = mysqli_query($Con, $sql);
        $chec2 = mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
        $id = $row['notification_id'];
        ?>
        <tr>
        <td>#<?php echo $row['id'];?></td>
        <td><?php echo $row['notification_id'];?></td>
        <td><?php echo $row['user_type'];?></td>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['message'];?></td>        
        <td>
       
        <?php 
        echo "<a href = '' data-toggle='modal' data-target='#myModalDeleteCode' data-userid='$id'> 
        <i class='fa fa-trash fa-fw text-danger'></i>
        </a>";
        ?>
        </td>
        </tr>
        <?php
        }
        ?>
        <tr>
        <td colspan = "8" style = "text-align:center;">
        <?php
        $check = mysqli_num_rows($result);
        if ($check<1) {
            echo "There are no general notifications at the moment";
        }
        ?>
        </td>
        </tr>
        </table>


                            </div>
                        </div>
                    </div>
            </div>                
            </div>
            <!-- /.container-fluid -->
        </div>
        </div>
        <!-- /#page-wrapper -->        
<!-- footer-->
    </div>
    <!-- /#wrapper -->


<div class="modal fade" id="myModalDeleteCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="myModalLabel">
                                    Delete notification
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/delete_gen_not.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DELETE</strong> THIS NOTIFICATION ?
                            <input type="hidden" name="token">
                            </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                                <button type="submit" name="deletecode" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Delete</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal-dialog -->



                        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="myModalLabel">
                                    Delete all notifications
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/delete_all_not.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DELETE ALL NOTIFICATION ?</strong>
                            <input type="hidden" name="token">
                            </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                                <button type="submit" name="deletecode" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Delete</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal-dialog -->


   
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Send general notification
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/send_gen_not.php">
                                <table class="table-modal">
                                    <tr>
                                        <td>
                                        <select class="form-control" name="recipient" required>
                                            <option selected disabled>Select Recipients</option>
                                            <option value="clients">Clients</option>
                                            <option value="writers">Writers</option>
                                            <option value="everyone">Everyone</option>
                                        </select>
                                        </td>
                                    <td>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                    </td>
                                    </tr>
                                    <tr>
                                    	<td colspan="2">
                                    		<textarea class="form-control" name="message" placeholder="your message here.." required></textarea>
                                    	</td>
                                    </tr>
                                </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="submit-gen" value="Send">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->    

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="scripts.js"></script>
    <script type="text/javascript">
    $('#myModalActivateCode').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="token"]').val(userid);
    });
    $('#myModalDeactivateCode').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="token"]').val(userid);
    });
    $('#myModalDeleteCode').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="token"]').val(userid);
    });
    $('#myModalDelete').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="token"]').val(userid);
    });
    </script>
    </body>

</html>
