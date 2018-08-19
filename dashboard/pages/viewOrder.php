<?php
include("connect.php");
include("session.php");
$id = $_GET['id'];
$file_addr  = "view";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">  <link rel="shortcut icon" href="../img/icon.png" />

<title>View Order #<?php echo $id ?> | Research Paper Web</title>

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
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View Order: # <?php echo $id;?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Home</a> / <a href = "availableOrders.php">Available Orders</a> / View Order</small>
                </h3>
            </div>

        <div class="row">
        <div class="col-lg-12">

        <?php
    $sql3       = "SELECT orderId FROM `bids` WHERE writerId = '$session_id' AND orderId = '$id'";
    $result3    = mysqli_query($Con, $sql3);
    $row3        = mysqli_num_rows($result3);

    if ($row3 != null) {
        echo "
        <div class='alert alert-info alert-dismissable'>
        Be patient please, your bid is awaiting selection
        </div>
        ";
    }else{

    $sql1 = "SELECT * FROM `order` WHERE orderStatus = 'taken' AND writerID = '$session_id' AND requestWriter = '$session_id'";
    $result1 = mysqli_query($Con, $sql1);
    $max = mysqli_num_rows($result1);

    $sql2       = "SELECT maxOrders FROM `writeraccount` WHERE reg_Id = '$session_id'";
    $result2    = mysqli_query($Con, $sql2);
    $row2        = mysqli_fetch_assoc($result2);
    $maxOrders  = $row2['maxOrders'];

    if ($max < $maxOrders) {
        echo "
        <div class='alert2 alert-info alert-dismissable'>
            Click 'Take this Order', if you are ready to execute this order
        <a class='take' id = 'confirm-take'>
          <button class='btn btn-success'>
                Take this Order
            </button>
        </a>
        </div>
        ";
    } elseif ($max >= $maxOrders) {
        echo "
        <div class='alert2 alert-success alert-dismissable'>
            Click 'Bid', if you are ready to execute this order.
        <a class = 'bid' id = 'confirm-bid'>
          <button class='btn btn-primary'>
                Place Bid
            </button>
        </a>
        </div>
        ";
    } else{
                echo "
        <div class='alert alert-success alert-dismissable'>
            an error occured please contact support
        </div>
        ";
    }
}
     ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Order: # <?php echo $id;?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Instructions</a>
                        </li>
                        <?php
                              $sql = "SELECT * FROM file_table
                              WHERE orderId = '$id' ORDER BY id DESC";
                              $result = mysqli_query($Con, $sql);
                              $chec2 = mysqli_num_rows($result);
                            ?>
                            <li><a href="#profile" data-toggle="tab">Files (<?php echo $chec2;?>)</a>
                            </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                        <hr/>
                        <?php
                            $sql = "SELECT * FROM `order` WHERE orderId = '$id'";
                            $result = mysqli_query($Con, $sql);
                            $check = mysqli_num_rows($result);
                            if ($check<1) {
                                echo "This order has already beed requested by another user";
                            }
                            while
                            ($row=mysqli_fetch_assoc($result)){
                            ?>                        
                <table class = "table" align="center" style="width:100%; font-size: 13px;table-layout:fixed;">
                  <tr class="success">
                      <td><b>Paper Topic:</b></td>
                      <td colspan="3"> <?php echo $row['paperTopic'];?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Paper Style:</b></td><td> <?php echo $row['paperStyle'];?></td>
                    <td><b>Spacing:</b></td><td> <?php echo $row['spacing'];?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Level:</b></td><td> <?php echo $row['level'];?></td>
                    <td><b>Type Of Work:</b></td><td> <?php echo $row['typeOfWork'];?></td>
                  </tr>
                  <tr class="danger" style="margin-bottom:0%">
                    <td><b>Deadline:</b></td><td> <?php echo $row['deadline'];?></td>
                    <td ><b>Amount:</b></td>
                    <td > <?php echo "$ ".$row['total'];?></td>                                    
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>No. of Pages:</b></td><td> <?php echo $row['numberOfPages'];?></td>
                    <td><b>No. of Sources:</b></td><td> <?php echo $row['numberOfsources'];?></td>
                  </tr>
                  <tr>
                      <td colspan="4"><h3>INSTRUCTIONS</h3></td>
                  </tr>
                  <tr>
                      <td colspan="4"><div style="word-wrap: break-word;"><?php echo nl2br($row['instructions']);?></div></td>
                  </tr>
                </table>
                <?php
                }
                ?>
            </div>
            <div class="tab-pane fade" id="profile">
    <!-- /.col-lg-6 -->
        <div class="col-lg-8">
            <div class="panel panel">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills">
                        <li class="active">
                        <a href="#home-pills" data-toggle="tab">Student Files </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-pills">
                            <?php
                            $sql = "SELECT * FROM `orderfiles` WHERE orderId = '$id';";
                            $result = mysqli_query($Con, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <a href="../../assets/order/student/<?php echo $row['file1']?>"><?php echo $row['file1'];?></a><br/>
                            <a href="../../assets/order/student/<?php echo $row['file2']?>"><?php echo $row['file2'];?></a><br/>
                            <a href="../../assets/order/student/<?php echo $row['file3']?>"><?php echo $row['file3'];?></a><br/>
                            <a href="../../assets/order/student/<?php echo $row['file4']?>"><?php echo $row['file4'];?></a><br/>
                            <a href="../../assets/order/student/<?php echo $row['file5']?>"><?php echo $row['file5'];?></a><br/>
                            <?php
                            }
                            ?>

                            <?php
                            $check = mysqli_num_rows($result);
                            if ($check<1) {
                                echo "There are no student files at the monent";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
            

        </div>    
              
        </div>
        <!-- /.row -->
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
<script type="text/javascript">
//Place Bid
$("#confirm-bid").on( 'click', function () {
    reset();
    alertify.confirm("Bid for this order ?", function (e) {
        if (e) {
            // alertify.success("You've clicked OK");
            window.location.href ='placeBid?id=<?=$id?>';  
        } else {
            alertify.error("You've clicked Cancel");
        }
    });
    return false;
});

//Confirm Take
$("#confirm-take").on( 'click', function () {
    reset();
    alertify.confirm("Are you sure you want to excecute this order ?", function (e) {
        if (e) {
            // alertify.success("You've clicked OK");
            window.location.href ='apply?id=<?=$id?>';  
        } else {
            alertify.error("You've clicked Cancel");
        }
    });
    return false;
});
</script>
</body>
</html>
