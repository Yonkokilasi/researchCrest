<?php
include("connect.php");
include("session.php");
$id=$_GET['token'];

$sql2              = "SELECT * FROM payment WHERE requestCode =  '$id'";
$result2           = mysqli_query($Con, $sql2);
$row2              = mysqli_fetch_assoc($result2);
$transactionCode  = $row2['transactionCode'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Research Paper Web || Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <h3 class="page-header">Requested Payment
                <small class = "breadcrumb pull-right"><a href = "index.php">Home</a> / <a href = "finance.php">Finance</a> / View Orders</small>
                </h3>
            </div>

            <!-- /.col-lg-4 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>TRANSACTION CODE:</strong> <?php echo $transactionCode ?>
                    </div>
                    <div class="panel-body">
                        <div id="posted_orders" style = "float:left;width:100%;">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            DATE REQUESTED
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ORDER ID
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STATUS
                            </td>                                
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            VALUE
                            </td>
                            </tr>
                            <?php
                            $sql = "SELECT
                            payment.orderId,
                            payment.amount,
                            payment.dateRequested
                            FROM
                            payment
                            WHERE
                            payment.requestCode =  '$id'";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            $dateRequested  = $row['dateRequested'];
                            $orderId        = $row['orderId'];
                            $value          = $row['amount'];
                            ?>
                            <tr>
                            <td><?php echo $dateRequested ?></td>                                
                            <td><a href="viewApproved?id=<?=$orderId?>">#<?php echo $orderId ?></a></td>
                            <th ><span class="label label-success pull-left">Requested</span></th>
                            <td>&#36;<?php echo round(($value*0.39), 2); ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </table>
                            <h4 class="pull-right">
                            <?php
                            $val = "SELECT Sum(payment.amount) AS Total FROM payment
                            WHERE
                            payment.requestCode =  '$id' ";
                            $query = mysqli_query($Con, $val);
                            $row=mysqli_fetch_assoc($query);
                            $grandTotal = round(($row['Total'])*0.39, 2);
                            ?>
                            <span class="info">Total : <?php echo "$".$grandTotal ?></span>&nbsp;&nbsp;
                            <span style="color: red">Fines : <?php echo "$0" ?></span>&nbsp;&nbsp;
                            <span style="color: blue">Grand Total : <?php echo "$".$grandTotal ?></span>&nbsp;
                            </h4>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <form method="POST" action="php/pay_order.php?amount=<?=$grandTotal?>&requestCode=<?=$id?>">
                            <button type="submit" name = "pay" class="btn btn-success">Pay for this order</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
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
