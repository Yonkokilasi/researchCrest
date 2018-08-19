<?php
include("connect
");
include("session
");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<link rel="shortcut icon" href="../img/icon.png" />

<title>Specific Writer Payments | Research Paper Web</title>

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
            <h3 class="page-header">Specific Writer Payments
            <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / Specific Writer Payments</small>
            </h3>
            <?php
            if(isset($_SESSION["msg"]))
                {
                $msg = $_SESSION["msg"];
                echo "
                        <div class='alert alert-info alert-dismissable'>
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
                    Eligible Amount &#36;&nbsp;<?php
                    $val = "SELECT Sum(payment.amount) AS Total FROM payment
                    WHERE
                    payment.eligible =  'eligible'";
                    $query = mysqli_query($Con, $val);
                    $row=mysqli_fetch_assoc($query);
                    $result = round(($row['Total'])*0.39, 2);

                    $result2 = sha1($result);


                    if ($result != null) {
                        echo $result;
                    } else {
                        echo "0";
                    }

                    ?> 
                    <?php 
                    $sql = "SELECT pay.status FROM pay WHERE pay.id =  '37702b12d58a007b86a4895'";
                    $result = mysqli_query($Con, $sql);
                    $row=mysqli_fetch_assoc($result);
                    $status = $row['status'];
                    if ($status == 'No') {
                    ?>
                    <form method="POST" action="php/activate_btn.php">
                        <button type="submit" name="activate" class="btn btn-success">Activate Payment Button</button>
                    </form>

                    <?php
                    }else if ($status == "Yes") {
                    ?>
                    <form method="POST" action="php/deactivate_btn.php">
                        <button type="submit" name="Deactivate" class="btn btn-danger">Deactivate Payment Button</button>
                    </form>

                    <?php
                    }
                    ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="finance.php#Specific">Specific Writer Payments</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">                            
                            <div class="tab-pane active" id="Specific">
                             <div id="posted_orders" style = "float:left;width:100%;">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            WRITER ID
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            PAYPAL EMAIL
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ELIGIBLE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            TOTAL
                            </td>                            
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ACTION
                            </td>
                            </tr>
                            <?php
                            $sql = "SELECT
                            SUM(payment.amount) AS Totals,
                            payment.Id,
                            payment.orderId,
                            payment.clientId,
                            payment.writerId,
                            payment.writerEmail,
                            payment.amount,
                            payment.eligible,
                            payment.dateCompleted,
                            payment.dateDue,
                            payment.dateRequested,
                            payment.datePaid,
                            payment.status,
                            payment.transactionCode,
                            payment.requestCode
                            FROM
                            payment
                            WHERE
                            payment.eligible =  'eligible'
                            GROUP BY
                            payment.writerId
                            ";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                            <td> <?php echo $row['writerId']; ?></td>                                
                            <td> <?php echo $row['writerEmail']; ?></td>
                            <td>&#36;<?php echo round(($row['Totals'])*0.39, 2);?></td>
                            <td>&#36;<?php echo round(($row['amount'])*0.39, 2);?></td>
                            <td> view</td>
                            <?php
                            }
                            ?>
                            </table>
                            </div>
                            </div>
                            <?php
                            $sql = "SELECT
                            SUM(`order`.total) AS Total
                            FROM
                            `order` WHERE orderStatus != 'paid' AND orderStatus != 'unpaid'";
                            $result = mysqli_query($Con, $sql);
                            $row=mysqli_fetch_assoc($result);
                            $t_Credit = $row['Total'];
                            $debit = round(($t_Credit*0.39), 2);
                            $n = $t_Credit - $debit;
                            ?>

                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->            
        </div>
        <!-- /.container-fluid -->
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