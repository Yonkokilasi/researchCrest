<?php
include("connect.php");
include("session.php");
$orderId = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">  <link rel="shortcut icon" href="../img/icon.png" />

<title>View Order #<?php echo $orderId ?> | Research Paper Web</title>

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
                <h3 class="page-header">View Order: # <?php echo $orderId;?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "posted.php">Posted Orders</a> / View Order</small>
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
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        New Message
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/send-msg.php">
                                <table class="table-modal">
                                    <tr>
                                        <th>Recipient</th>
                                        <th>Order Id</th>
                                    </tr>
                                    <tr>
                                    <td>
                                    <input type = "text" name="recipient" class="form-control" value="Student" readonly>
                                    </td>
                                    <td>
                                    <input type="text" name="orderId" class="form-control" value="<?php echo $orderId ?>" readonly>
                                    </td>
                                    </tr>
                                </table>
                                    Subject
                                    <input type="text" name="subject" class="form-control" required="required">
                                    Message
                                    <textarea maxlength="2000" name="message" class="form-control" required="required"></textarea>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary " name="submit-msg" value="Send">
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>    

        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order: # <?php echo $orderId;?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Instructions</a>
                        </li>
                        <?php
                              $sql = "SELECT * FROM file_table
                              WHERE orderId = '$orderId' ORDER BY id DESC";
                              $result = mysqli_query($Con, $sql);
                              $chec2 = mysqli_num_rows($result);
                            ?>
                            <li><a href="#profile" data-toggle="tab">Files (<?php echo $chec2;?>)</a>
                            </li>
<?php
                            $sql9    = "SELECT * FROM `messaging` WHERE orderId = '$orderId' ORDER BY id DESC";
                            $result9 = mysqli_query($Con, $sql9);
                            $chec9 = mysqli_num_rows($result9);
                            ?>
                            <li><a href="#message" data-toggle="tab">Messages (<?php echo $chec9;?>)</a>
                            </li> 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                        <hr/>
                        <?php
                            $sql = "SELECT * FROM `order` WHERE orderId = '$orderId'";
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
                            $sql = "SELECT * FROM `orderfiles` WHERE orderId = '$orderId';";
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
        <div class="tab-pane fade in" id="message">
        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                        <button class='btn btn-primary btn-outline' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'>
                            Create message
                        </button> 
                        <hr/>                  
                        <?php
                        $sql2    = "SELECT * FROM `messaging` WHERE orderId = '$orderId' ORDER BY id DESC";
                        $result2 = mysqli_query($Con, $sql2);
                        $chec2 = mysqli_num_rows($result2);
                        while($row2=mysqli_fetch_assoc($result2)){
                        $msgId      = $row2['id'];
                        $orderId    = $row2['orderId'];
                        $sender     = $row2['sender'];
                        $recipient  = $row2['recipient'];
                        $subject    = $row2['subject'];
                        $message    = $row2['message'];
                        $status     = $row2['status'];
                        $time       = $row2['time'];
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $msgId ?>">
                                    <?php
                                    if ($sender != "Support" && $status == "unread") {
                                    ?>
                                    <small><b style="color: black;">
                                        <?php 
                                        if ($sender == "Support") {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient;
                                        }
                                        ?>
                                        <?php echo "(".$time.")"?>
                                    </b></small>
                                    <small class="pull-right"><strong style="color: orange;">Order #<?php echo $orderId; ?></strong></small></a>
                                    <?php
                                    } else{
                                    ?>
                                    <small>
                                        <?php 
                                        if ($sender == "Support") {
                                            echo "From: Me";
                                        } else{
                                            echo "From: ".$sender;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient;
                                        }
                                        ?>
                                        <?php echo "(".$time.")"?>
                                    </small>
                                    <small  class="pull-right">Order #<?php echo $orderId; ?></small></a>
                                    <?php
                                    }
                                    ?>
                                </h4>
                            </div>
                            <div id="<?php echo $msgId ?>" class="panel-collapse collapse view-message">
                                <div class="panel-body" style="word-wrap: break-word" >
                                <b><?php echo $subject?></b><br/>
                                <?php echo nl2br($message)?>

                                <?php
                                if ($sender != "Support") {
                                echo "<a href = 'reply_msg.php?id=$msgId' class='btn btn-success pull-right'>Reply</a>";
                                }
                                ?>
                                 </div>
                                </div>
                             </div>
                            <?php
                            }
                            ?>       
                            </div>
                        </ul>                            
                        </div>
                        <!-- .panel-body -->
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
            window.location.href ='placeBid.php?id=<?=$id?>';  
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
            window.location.href ='apply.php?id=<?=$id?>';  
        } else {
            alertify.error("You've clicked Cancel");
        }
    });
    return false;
});
</script>
</body>
</html>
