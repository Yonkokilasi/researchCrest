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

<title>Financial Overview | Research Paper Web</title>

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
            <h3 class="page-header">Financial Overview
            <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / Financial Overview</small>
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
                            <li><a href="finance.php#Unrequested" >Unrequested</a>
                            </li>
                            <li class="active"><a href="finance-requested.php#Requested">Requested</a>
                            </li>
                            <li><a href="finance-refunds.php#Refunds" >Refunds</a>
                            </li>                            
                            <li><a href="finance-history.php#History" >History</a>
                            </li>
                            <li><a href="finance-account.php#Account" >Account</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade" id="Unrequested">
                            
                            <div id="posted_orders" style = "float:left;width:100%;">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            DATE COMPETED
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ORDER ID
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STATUS
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            TRANSACTION TYPE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            COMMENTS
                            </td>                                
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            VALUE
                            </td>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM `order` , payment WHERE
                            `order`.orderId     =  payment.orderId AND
                            `order`.clientId    =  payment.clientId AND
                            `order`.writerId    =  payment.writerId AND
                            payment.eligible    =  'eligible' AND
                            payment.status      =  'unrequested'";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){

                            //select time and append timezone                                    
                            $hour = $zone;

                            $time = $hour.'minute';

                            $date = $row['dateCompleted'];

                            $deadline = date("Y-m-d H:i:s", strtotime($date . $time));

                            $dateCompleted2 = substr($deadline, 0, 10);
                            //select time and append timezone    
                            ?>
                            <tr>
                            <td><?php echo $dateCompleted2 ?></td>                                
                            <td>#<?php echo $row['orderId'];?></td>
                            <th ><span class="label label-default pull-left">Unrequested</span></th>
                            <td>
                            Order approved (<small><?php echo $row['numberOfPages'];?> Pages</small>)</td>
                            <td><?php echo $row['paperSubject'];?></td>
                            <td>&#36;<?php echo round(($row['total'])*0.39, 2);?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </table>
                            </div>
                            </div>
                            <div class="tab-pane fade  in active" id="Requested">
                            <div id="posted_orders" style = "float:left;width:100%;">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            REQUEST CODE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STATUS
                            </td>                            
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            DATE REQUESTED
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            PAYPAL EMAIL
                            </td>                                
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            VALUE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ACTION
                            </td>
                            </tr>
                            <?php
                            $sql = "SELECT
                            payment.Id,
                            payment.orderId,
                            payment.clientId,
                            payment.writerId,
                            payment.writerEmail,
                            SUM(payment.amount) AS Totals,
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
                            payment.status =  'requested' AND
                            payment.eligible =  'eligible'
                            GROUP BY
                            payment.requestCode
                            ORDER BY
                            payment.dateRequested DESC";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            $dateCompleted = $row['dateCompleted'];
                            $dateCompleted2 = substr($dateCompleted, 0, 10);
                            $request_token = $row['requestCode'];
                            $writerId  = $row['writerId'];
                            ?>
                            <tr>
                            <td><a href = request-details?token=<?=$request_token?>>
                            <?php 
                            $r_code = $row['requestCode'];
                            echo substr($r_code, 0, 15);
                            ?>
                            </a></td>                                
                            <th ><span class="label label-primary pull-left">Requested</span></th>
                            <td><?php 
                            //select time and append timezone                                    
                            $hour1 = $zone;

                            $time1 = $hour1.'minute';

                            $date1 = $row['dateRequested'];

                            echo $deadline = date("Y-m-d H:i:s", strtotime($date1 . $time1));
                            //select time and append timezone

                            ?></td>
                            <td>    
                            <?php
                            $pp = mysqli_fetch_assoc(mysqli_query($Con, "SELECT writeraccount.paypalEmail FROM writeraccount WHERE writeraccount.reg_Id =  '$writerId' AND writeraccount.account =  'default'"));
                            echo $paypal_email = $pp['paypalEmail'];
                            ?>
                            </td>
                            <td>&#36;<?php echo $amount = round(($row['Totals'])*0.39, 2);?></td>
                            <td>
                            <form method="POST" action="paypal/checkout.php?amount=<?=$amount?>&paypalemail=<?=$paypal_email?>&rId=<?=$request_token?>">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <button type="submit" name="refund_student" class=" btn btn-primary">Pay</button>
                            </form>
                            
                            </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </table>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="Refunds">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ORDER ID
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STATUS
                            </td>                            
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STUDENT ID
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            WRITER ID
                            </td>                            
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            AMOUNT
                            </td>                                
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ACCOUNT
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            TRANSACTION CODE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            ACTION
                            </td>                            
                            </tr>
                            <?php
                            $sql = "SELECT
                            *
                            FROM
                            `order`
                            WHERE
                            `order`.orderStatus =  'paid' AND
                            `order`.dateDue =  'refund' OR 
                            `order`.dateDue =  'refunded'
                            ORDER BY orderId DESC
                            ";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                             $p_status      = $row['dateDue'];
                             $orderId       = $row['orderId'];
                             $orderStatus   = $row['orderStatus'];   
                            ?>
                            <tr>
                            <td><?php echo $row['orderId'];?></a></td>
                            <td><?php 
                            if ($p_status == "refund") {
                                echo "<span class='label label-primary pull-left'>Pending</span>";
                            } else if ($p_status == "refunded") {
                                echo "<span class='label label-success pull-left'>Refunded</span>";
                            }
                            ?></td>                                
                            <th ><?php echo $row['clientId'];?></th>
                            <td><?php echo $row['writerId'];?></td>
                            <td>&#36;<?php echo round(($row['total'])*0.39, 2);?></td>
                            <td><?php echo $row['paymentMode'];?></td>
                            <td><?php echo $row['transactionCode'];?></td>
                            <td>
                            <?php if (($orderStatus == 'paid') && ($p_status != 'refunded')) {?>
                             <form method="POST" action="php/refund.php.php?id=<?=$orderId?>">
                            <button type="submit" name="refund_student" class="btn-warning">Refund</button>
                            </form>
                            <?php
                            } else {
                            echo "Done"; 
                             } 
                            ?>
                            </td>
                            <?php
                            }
                            ?>
                            </table>
                            </div>                            
                            <div class="tab-pane fade" id="History">
                             <div id="posted_orders" style = "float:left;width:100%;">
                            <table class = "table" align="center" style="width:100%; font-size: 12px;">
                            <tr style="with:100%; background-color: #eeeeee; ">
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            REQUEST CODE
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            STATUS
                            </td>
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            DATE REQUESTED
                            </td>                            
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            DATE PAID
                            </td>                                
                            <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                            VALUE
                            </td>
                            </tr>
                            <?php
                            $sql = "SELECT
                            payment.Id,
                            payment.orderId,
                            payment.clientId,
                            payment.writerId,
                            payment.writerEmail,
                            SUM(payment.amount) AS Totals,
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
                            payment.status =  'paid' AND
                            payment.eligible =  'paid'
                            GROUP BY
                            payment.requestCode
                            ORDER BY
                            payment.datePaid
                            DESC";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            $dateCompleted = $row['dateCompleted'];
                            $dateCompleted2 = substr($dateCompleted, 0, 10);
                            $request_token = $row['requestCode'];
                            ?>
                            <tr>
                            <td><a href = request_details?token=<?=$request_token?>>
                            <?php 
                            $r2_code = $row['requestCode'];
                            echo substr($r2_code, 0, 15);
                            ?></a></td>                                
                            <th ><span class="label label-primary pull-left">Paid</span></th>
                            <td><?php 
                            //select time and append timezone                                    
                            $hour2 = $zone;

                            $time2 = $hour2.'minute';

                            $date2 = $row['dateRequested'];

                            echo $deadline2 = date("Y-m-d H:i:s", strtotime($date2 . $time2));
                            //select time and append timezone
                            ?></td>
                            <td><?php
                            //select time and append timezone                                    
                            $hour3 = $zone;

                            $time3 = $hour3.'minute';

                            $date3 = $row['datePaid'];

                            echo $deadline3 = date("Y-m-d H:i:s", strtotime($date3 . $time3));
                            //select time and append timezone                             
                            ?></td>
                            <td>&#36;<?php echo round(($row['Totals'])*0.39, 2);?></td>
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
                            <div class="tab-pane fade" id="Account">

                                <div class="well col-md-8">
                                <blockquote>
                                <p>Total Credit: <?php echo "$ ".$t_Credit ?></p>
                                <p>Total Debit: <?php echo "$ ".$debit ?></p>
                                <p>NPV: <?php echo "$".$n ?></p>
                                </blockquote>
                                </div>
                            </div>
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