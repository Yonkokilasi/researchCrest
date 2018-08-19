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

    <title>Admin | Research Paper Web</title>

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
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Admin Dashboard
                        <small class = "breadcrumb pull-right">Dashboard / Edit order</small>
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
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    REMEMBER to select ORDER on the dropdown BEFORE using any command.
                </div>                
                    </div>
                <div class="row">
               <form method="POST" action="">
               <table class="table" >
                   <tr>
                       <td>
                       <input type="text" name="orderId" id="orderId" class = "form-control" placeholder="order id" onkeyup="check_id()" onchange="check_id()" >
                       <span id="paste_ids"></span>
                       </td>
                       <td>
                       <button type="submit" name = "edit" class="btn btn-primary">Edit</button>
                       <button type="submit" name = "dispute" class="btn btn-primary">Dispute</button>
                       <button type="submit" name = "approve" class="btn btn-primary">Approve</button>
                       <button type="submit" name = "revise" class="btn btn-primary">Revise</button>
                       <button type="submit" name = "post" class="btn btn-primary">Repost</button>
                       <button type="submit" name = "archive" class="btn btn-primary">Archive</button>
                       <button type="submit" name = "delete" class="btn btn-danger">Delete</button>    
                       </td>
                   </tr>
               </table>
               </form>
            </div>           

            <div class="row">
               <?php
               $orderId = $_POST['orderId'];

               if (isset($_POST['edit'])) {
                $sql1    = "SELECT * FROM `order` WHERE orderId = '$orderId'";
                $result1 = mysqli_query($Con, $sql1);                   
                $row1    = mysqli_fetch_array($result1);
                ?>
                <form method="POST" action="php/update_order.php">
                <table class = "table" align="center" style="width:100%; font-size: 13px;table-layout:fixed;">
                  <tr class="danger">
                      <td><b>SELECTED ORDER:</b></td>
                      <td> 
                      <input type="hidden" name="orderId" value="<?php echo $row1['orderId']; ?>">
                      <?php echo $row1['orderId'];?>
                      </td>
                      <td><b>ORDER STATUS:</b></td>
                      <td> <?php echo $row1['orderStatus'];?></td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Client Id:</b></td><td> 
                    <input type="text" class="form-control" name="clientId" value="<?php echo $row1['clientId'];?>"> </td>
                    <td><b>Writer Id:</b></td><td> 
                    <input type="text" name="writerId" class="form-control" value="<?php echo $row1['writerId'];?>">
                    </td>
                  </tr>
                  <tr class="success">
                      <td><b>Paper Topic:</b></td>
                      <td colspan="3"> 
                        <input type="text" name="paperTopic" class="form-control" value="<?php echo $row1['paperTopic'];?>">
                      </td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Paper Style:</b></td><td> 
                    <input type="text" name="paperStyle" class="form-control" value="<?php echo $row1['paperStyle'];?>">
                    </td>
                    <td><b>Spacing:</b></td><td> 
                    <input type="text" name="spacing" class="form-control" value="<?php echo $row1['spacing'];?>">
                    </td>
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>Level:</b></td><td> 
                    <input type="text" name="level" class="form-control" value="<?php echo $row1['level'];?>">
                    </td>
                    <td><b>Type Of Work:</b></td><td> 
                    <input type="text" name="typeOfWork" class="form-control" value="<?php echo $row1['typeOfWork'];?>">
                    </td>
                  </tr>
                  <tr class="danger" style="margin-bottom:0%">
                    <td><b>Deadline:</b></td><td> 
                    <input type="text" name="deadline" class="form-control" value="<?php echo $date = $row1['deadline']; ?>">
                    </td>
                    <td ><b>Amount($):</b></td>
                    <td > <input type="text" name="amount" class="form-control" value="<?php echo $row1['total'];?>">
                    </td>                                    
                  </tr>
                  <tr style="margin-bottom:0%">
                    <td><b>No. of Pages:</b></td><td> 
                    <input type="text" name="numberOfPages" class="form-control" value="<?php echo $row1['numberOfPages'];?>">
                    </td>
                    <td><b>No. of Sources:</b></td><td> 
                <input type="text" name="numberOfSources" class="form-control" value="<?php echo $row1['numberOfsources'];?>">
                    </td>
                  </tr>
                  <tr class="danger" style="margin-bottom:0%">
                    <td><b>Digital sources:</b></td><td> 
                    <input type="text" name="digitalSources" class="form-control" value="<?php echo $date = $row1['digitalSources']; ?>">
                    </td>
                    <td ><b>Payment Id:</b></td>
                    <td > <input type="text" name="transactionCode" class="form-control" value="<?php echo $row1['transactionCode'];?>">
                    </td>                                    
                  </tr>
                  <tr>
                      <td colspan="4"><h3>INSTRUCTIONS</h3></td>
                  </tr>
                  <tr>
                      <td colspan="4"><div style="word-wrap: break-word;"><?php echo nl2br($row1['instructions']);?></div></td>
                  </tr>
                </table>
                <button type="submit" name="update_details" class="btn btn-lg btn-success center">Update order details</button>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </form>
                <?php
               }else if (isset($_POST['dispute'])) {

                $query=mysqli_query($Con, "UPDATE `order` SET `order`.orderStatus = 'disputed'
                WHERE `order`.orderId     = '$orderId'");
                $query2=mysqli_query($Con, "DELETE FROM `payment` WHERE `payment`.orderId     = '$orderId'");
                echo "Order #".$orderId. " has beed disputed";

               }else if (isset($_POST['approve'])) {
                
                $query=mysqli_query($Con, "UPDATE `order` SET `order`.orderStatus = 'done'
                WHERE `order`.orderId     = '$orderId'");
                echo "Order #".$orderId. " has beed approved";

               }else if (isset($_POST['revise'])) {
                
                $query=mysqli_query($Con, "UPDATE `order` SET `order`.orderStatus = 'revision'
                WHERE `order`.orderId     = '$orderId'");
                //$query2=mysqli_query($Con, "DELETE FROM `payment` WHERE `payment`.orderId     = '$orderId'");
                echo "Revision request has been made on Order #".$orderId;

               }else if (isset($_POST['post'])) {
                
                $query=mysqli_query($Con, "UPDATE `order` SET `order`.orderStatus = 'not taken',`order`.writerId = '',`order`.requestWriter = 'writerId'
                WHERE `order`.orderId     = '$orderId'");
                $query2=mysqli_query($Con, "DELETE FROM `payment` WHERE `payment`.orderId     = '$orderId'");
                echo "Order #".$orderId. " has beed made available to all writers";

               }else if (isset($_POST['archive'])) {
                   $query=mysqli_query($Con, "UPDATE `order` SET `order`.orderStatus = 'paid'
                WHERE `order`.orderId     = '$orderId'");
                //$query2=mysqli_query($Con, "DELETE FROM `payment` WHERE `payment`.orderId     = '$orderId'");
                echo "Order #".$orderId. " has beed moved to archive";
               }else if (isset($_POST['delete'])) {
                
                $query=mysqli_query($Con, "DELETE FROM `order` WHERE `order`.orderId     = '$orderId'");
                $query2=mysqli_query($Con, "DELETE FROM `payment` WHERE `payment`.orderId     = '$orderId'");
                $query3=mysqli_query($Con, "DELETE FROM `file_table` WHERE `file_table`.orderId     = '$orderId'");
                $query3=mysqli_query($Con, "DELETE FROM `complains` WHERE `complains`.orderId     = '$orderId'");
                $query3=mysqli_query($Con, "DELETE FROM `messaging` WHERE `messaging`.orderId     = '$orderId'");
                echo "Order #".$orderId. " Order has been successfully DELETED";

               }else {
                echo "No command selected";
               }
               ?>
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
    <script src="scripts.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <?php
          $sql = "SELECT * FROM `notifications` WHERE writerId = '$session_id' AND status = 'not viewed'";
            $result = mysqli_query($Con, $sql);
            $query = mysqli_num_rows($result);
                if ($query > 0) {
         echo '
        <script type="text/javascript">
        $(document).ready( function () {
            reset();
            alertify.success("You have new notification(s)", "", 0);
            return false;
        });
        </script>
        ';
        
        }
    ?>
      
<script type="text/javascript">
function check_id(){

var order_id = $('#orderId').val();
$.post("php/get_order_id.php",{"orderId":order_id},function(data) {

$( '#paste_ids' ).html(data);
return false;

  });  
}
</script>        
</body>
</html>
