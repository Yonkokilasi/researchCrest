<?php
include("connect.php");
include("session.php");
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;

$statement = "`codes`";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>promotional codes | Research Paper Web</title>

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
                <h3 class="page-header">Promotional code(s)
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / Code</small>
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
                    <button class='btn btn-primary btn-outline' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'> Set new code </button>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion"> 
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
        <tr style="with:100%; background-color: #eeeeee; ">
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ID
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        CODE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        PERCENTAGE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ACTIVE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ACTION
        </td>
        </tr>
        <?php
        $sql = "SELECT * FROM codes LIMIT {$startpoint} , {$limit};";
        $result = mysqli_query($Con, $sql);
        $chec2 = mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
        $active = $row['active'];
        $id = $row['id'];
        ?>
        <tr>
        <td>#<?php echo $row['id'];?></td>
        <td><?php echo $row['code'];?></td>
        <td><?php echo $row['percentage'];?></td>
        <td><?php echo $row['active'];?></td>        
        <td>
       
        <?php 
        if ($active == "no") {
            echo "
            <a href = '' data-toggle='modal' data-target='#myModalActivateCode' data-userid='$id'> 
            <i class='fa fa-check-square fa-fw text-success'></i>
            </a>";
        } else{
            echo "
            <a href = '' data-toggle='modal' data-target='#myModalDeactivateCode' data-userid='$id'> 
            <i class='fa fa-times fa-fw text-danger'></i>
            </a>";
        }
        echo "<a href = '' data-toggle='modal' data-target='#myModalDeleteCode' data-userid='$id'> 
        <i class='fa fa-trash fa-fw'></i>
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
            echo "There are no promotional codes at the monent";
        }
        ?>
        </td>
        </tr>
         <tr>
        <td colspan="7">
        <?php
        echo pagination($statement,$limit,$page);
        ?></td>
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
                                    Delete Promotional Code
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/delete_code.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DELETE</strong> THE PROMOTIONAL CODE ?
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



<div class="modal fade" id="myModalDeactivateCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="myModalLabel">
                                    Deactivate Promotional Code
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/deactivate_code.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: red">DEACTIVATE</strong> THE PROMOTIONAL CODE ?
                            <input type="hidden" name="token">
                            </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                                <button type="submit" name="activate" class="btn btn-danger">
                                <i class="fa fa-times"></i>
                                Deactivate</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal-dialog -->




<div class="modal fade" id="myModalActivateCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="myModalLabel">
                                    Activate Promotional Code
                                </h5> 
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="php/activate_code.php">
                             ARE YOU SURE YOU WANT TO <strong style="color: green">ACTIVATE</strong> THE PROMOTIONAL CODE ?
                            <input type="hidden" name="token">
                            </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                                <button type="submit" name="activate" class="btn btn-success">
                                <i class="fa fa-check-square"></i>
                                Activate</button>
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
                                        Set promotional code
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/promotional_code.php">
                                <table class="table-modal">
                                    <tr>
                                        <td>
                                        <input type="text" id="promo_code" name="promocode" class="form-control" placeholder="Promotional Code" required="required" readonly="readonly">
                                        </td>
                                    <td>
                                        <input type="text" name="percentage" maxlength="2" class="form-control" placeholder="Percentage" required="required" pattern="[0-9]*">
                                    </td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-default" onclick="promoCode();">Generate Code</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="submit-code" value="Save">
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
    </script>
    </body>

</html>
