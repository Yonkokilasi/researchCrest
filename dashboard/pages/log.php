<?php
include("connect.php");
include("session.php");
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 20;
$startpoint = ($page * $limit) - $limit;

$statement = "`log`";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>log's | Research Paper Web</title>

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
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/B_blue.css" rel="stylesheet" type="text/css" />
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
                <h3 class="page-header">Paypal log
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / Paypal log</small>
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
                    <button class='btn btn-danger' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'> Clear all log <i class='fa fa-trash fa-fw'></i></button>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion"> 
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
        <tr style="with:100%; background-color: #eeeeee; ">
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        #
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ORDER ID
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        DATE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        STATUS
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        EMAIL
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        TXN ID
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ACTION
        </td>
        </tr>
        <?php
        $sql = "SELECT * FROM log LIMIT {$startpoint} , {$limit};";
        $result = mysqli_query($Con, $sql);
        $chec2 = mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        ?>
        <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['order_id'];?></td>
        <td><?php echo $row['payment_date'];?></td>
        <td><?php echo $row['payment_status'];?></td>
        <td><?php echo $row['payer_email'];?></td>
        <td><?php echo $row['txn_id'];?></td>        
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
            echo "There are no paypal logs at the moment";
        }
        ?>
        </td>
        </tr>
         <tr>
        <td colspan="7">
        <?php
        echo pagination($statement,$limit,$page);
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
                                    Delete log
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/delete_log.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DELETE</strong> THIS LOG ?
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
                                    Delete log
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/delete_log_all.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DELETE ALL LOG</strong> ?
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
    
    $('#myModalDeleteCode').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="token"]').val(userid);
    });
    </script>
    </body>

</html>
