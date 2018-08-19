<?php
include("connect.php");
include("session.php");
if (isset($_GET['id'])) {
$orderId = $_GET['id'];
include('pagination/function_view.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;

$statement = "`messaging` WHERE orderId = '$orderId'";
} else{
$orderId = NULL;    
}
$file_addr  = "assigned";



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
<link rel="stylesheet" href="css/table-styler-view.css" type="text/css" media="screen, print"/>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
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
                                <form method="POST" action="php/messages/sendMsg-assigned.php">
                                <table class="table-modal">
                                    <tr>
                                        <th>Recipient</th>
                                        <th>Order Id</th>
                                    </tr>
                                    <tr>
                                    <td>
                                    <select name="recipient" class="form-control">
                                        <option>Student</option>
                                        <option>Writer</option>
                                    </select>
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h5 class="modal-title" id="myModalLabel">
                  Upload files for order #<?php echo $orderId
                  ?>
              </h5>
          </div>
          <div class="modal-body">
         
          <?php include('upload/index.php'); ?>

          </div>
          <div class="modal-footer">
            <form method="POST" action="php/redirect.php?page=viewAssigned.php&id=<?=$orderId?>">
              <button id="px-submit" type="submit" name="done" class="btn btn-primary">
              <i class="fa fa-fw fa-check"></i>
              Done</button>
            </form>
          </div>
          </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>                        
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View Order: # <?php echo $orderId;?>
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "assigned.php">Assigned Orders</a> / View Order</small>
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
<?php
if(mysqli_num_rows(mysqli_query($Con, "SELECT * FROM `order` WHERE orderId = '$orderId' AND orderStatus = 'not taken'"))>0)
{            
?> 		<div class="alert2 alert-info">
            <?php
                $sql        = "SELECT requestWriter,clientId, writerId FROM `order` WHERE orderId = '$orderId'";
                $query      = mysqli_query($Con, $sql);
                $row        = mysqli_fetch_assoc($query);
                $writerId   = $row['requestWriter'];
                $clientId   = $row['clientId'];

                $sql6       = "SELECT * FROM `registration` WHERE reg_id = '$clientId'";
                $query6     = mysqli_query($Con, $sql6);
                $row6       = mysqli_fetch_assoc($query6);
                $email      = $row6['email'];
                $user_name  = $row6['user_name'];
                echo "<strong>Posted By: </strong>".$email." <i class='fa fa-hand-o-right fa-fw'></i> ".$user_name."(Client Id: ".$clientId.") <br/>";

                $sql_6       = "SELECT * FROM `registration` WHERE reg_id = '$writerId'";
                $query_6     = mysqli_query($Con, $sql_6);
                $row_6       = mysqli_fetch_assoc($query_6);
                $email_6     = $row_6['email'];
                $user_name_6 = $row_6['user_name'];
                echo "<strong>Assigned to: </strong>".$email_6." <i class='fa fa-hand-o-right fa-fw'></i> ".$user_name_6."(Writer Id: ".$writerId.")";


                ?>
        </div> 
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
                            <li><a href="#files" data-toggle="tab">Files (<?php echo $chec2;?>)</a>
                            <?php
                            $sql9    = "SELECT * FROM `messaging` WHERE orderId = '$orderId' ORDER BY id DESC";
                            $result9 = mysqli_query($Con, $sql9);
                            $chec9 = mysqli_num_rows($result9);
                            ?>
                            <li><a href="#messages" data-toggle="tab">Messages (<?php echo $chec9;?>)</a>
                            </li> 
                        <li><a href="#assign" data-toggle="tab">Re-Assign Writer</a>
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
                    <td><b>Deadline:</b></td><td> <?php 
                    //select time and append timezone                                    
                    $hour = $zone;

                    $time = $hour.'minute';

                    $date = $row['deadline'];

                    $deadline = date("Y-m-d H:i:s", strtotime($date . $time));

                    echo $deadline;
                    //select time and append timezone
                    ?></td>
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
            <div class="tab-pane fade" id="files">
<div class="col-lg-12">                        
        <!-- /.panel-heading -->
        <div class="panel-body">
                <button class="btn btn-primary" data-toggle='modal' data-target='#myModal2' >
                <i class="fa fa-upload"></i>
                Upload Files</button>
                <p>&nbsp;</p>
                  <div style = "float:left;width:100%;">
                    <table class = "table" align="center" style="width:100%; font-size: 14px;">
                    <tr style="with:100%; background-color: #eeeeee; ">
                    <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                    #
                    </td>
                    <td>File</td>
                    <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
                    Details
                    </td>
                    <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;" align="left">
                    Who Uploaded
                    </td>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM file_table
                    WHERE orderId = '$orderId' ORDER BY id DESC";
                    $result = mysqli_query($Con, $sql);
                    $chec2 = mysqli_num_rows($result);
                    while($row=mysqli_fetch_assoc($result)){
                      $size = $row['size'];
                      $name = $row['file_name'];
                    ?>
                    <tr>
                    <td>#<?php echo $row['id'];?></td>
                    <td>
                    <?php echo "<a href = 'download.php?file=$name'>
                    <i class='fa fa-2x fa-file-text text-info'></i></a>" ;?>
                    </td>
                    <td >
                   <?php echo "<a href = 'download.php?file=$name'>".$name."</a>" ;?><br />
                    <?php echo $row['description'];?><br/>
                    <?php echo $size;?> KB &nbsp;&nbsp;
                    <?php 
                    //select time and append timezone                                    
                    $hour = $zone;

                    $time = $hour.'minute';

                    $date = $row['time']; 

                    $add_min = date("Y-m-d H:i:s", strtotime($date . $time));

                    echo $add_min;
                    //select time and append timezone
                    ?>
                    </td>
                    <td><?php echo $row['uploaded_by'];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                    <td colspan = "8" style = "text-align:center;">
                    <?php
                    $check = mysqli_num_rows($result);
                    if ($check<1) {
                        echo "there are no files at the moment";
                    }
                    ?>
                    </td>
                    </tr>
                    </table>
                    </div> 
        </div>
        <!-- /.panel-body -->
</div>
<!-- /.col-lg-6 -->

</div>
        <div class="tab-pane fade in" id="messages">
        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                        <button class='btn btn-primary btn-outline' style='margin-left: 15px;' data-toggle='modal' data-target='#myModal'>
                            Create message
                        </button> 
                        <hr/>                  
                        <?php
                        $sql2    = "SELECT * FROM `messaging` WHERE orderId = '$orderId' ORDER BY id DESC  LIMIT {$startpoint} , {$limit}";

                        $result2 = mysqli_query($Con, $sql2);
                        $chec2 = mysqli_num_rows($result2);
                        while($row2=mysqli_fetch_assoc($result2)){
                        $msgId      = $row2['id'];
                        $orderId    = $row2['orderId'];
                        $sender     = $row2['sender'];
                        $row3 = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `registration` WHERE reg_id = '$sender'"));
                        $user = $row3['user_type'];
                        if ($user == "writer") {
                        $sender2 = "Writer";
                        } else if ($user == "client") {
                            $sender2 = "Student";
                        } else {
                            $sender2 = "Me";
                        }
                        $recipient  = $row2['recipient'];
                        $row4 = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `registration` WHERE reg_id = '$recipient'"));
                        $user = $row4['user_type'];
                        if ($user == "writer") {
                        $recipient2 = "Writer";
                        } else if ($user == "client") {
                            $recipient2 = "Student";
                        } else {
                            $recipient2 = "Me";
                        }
                        $subject    = $row2['subject'];
                        $message    = $row2['message'];
                        $status     = $row2['status'];
                        $time       = $row2['time'];
                        //select time and append timezone                                    
                        $hour = $zone;

                        $time2 = $hour.'minute';

                        $date = $row2['time']; 

                        $add_time = date("Y-m-d H:i:s", strtotime($date . $time2));
                        //select time and append timezone
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
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$add_time.")"?>
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
                                            echo "From: ".$sender2;
                                        }
                                        ?> 
                                        <i class="fa fa-long-arrow-right"></i>
                                        
                                        <?php 
                                        if ($recipient == "Support") {
                                            echo "To: Me";
                                        } else{
                                            echo "To: ".$recipient2;
                                        }
                                        ?>
                                        <?php echo "(".$add_time.")"?>
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
                                if ($sender != 'Support') {
                                echo "<a href = 'reply_msg.php?id=$msgId' class='btn btn-success pull-right'>Reply</a>";
                                }
                                ?>
                                 </div>
                                </div>
                             </div>
                            <?php
                            }
                            ?>
                            <p>&nbsp;</p>
                            <?php
                            echo pagination($statement,$limit,$page);
                            ?>       
                            </div>
                        </ul>                            
                        </div>
                        <!-- .panel-body -->
        </div>
        <div class="tab-pane fade in" id="assign">
        <hr/>
        <form method="POST" action="php/writerReassign2.php">        
        <?php
          $sql = "SELECT requestWriter FROM `order` WHERE orderId = '$orderId'";
          $result = mysqli_query($Con, $sql);
          $row = mysqli_fetch_array($result);
          $writerId = $row['requestWriter'];

          $sql5 = "SELECT user_name FROM `registration` WHERE reg_id = '$writerId'";
          $result5 = mysqli_query($Con, $sql5);
          $row5 = mysqli_fetch_array($result5);
          $user_name = $row5['user_name'];

          if ($writerId == "writerId") {
              echo "Assign Order";
          }else{
            echo "<div class = 'alert2 alert-info'>order has been assigned to ".$user_name." (".$writerId."). Do you want to re-assign</div>";
          }

        ?>
        <table>
            <tr style="border-spacing: 5px">
                <td>User Name:</td>
                <td>
                <input type="hidden" name="orderId" value="<?php echo $orderId;?>">                
                    <?php
                      $sql = "SELECT reg_id, user_name FROM `registration` WHERE user_type = 'writer' and account_status = 'active' and activation_status = 'active'";
                      $result = mysqli_query($Con, $sql);
                      echo "<select name='writerId' class='form-control'>";
                       while ($row = mysqli_fetch_array($result)) {
                       echo "<option value = ".$row['reg_id'].">".$row['user_name']." (" .$row['reg_id'].")</option>";
                      }
                      echo "</select>";
                    ?>
                </td>
                <td>&nbsp;</td>
                <td><button type = "submit" name="assign" class="btn btn-primary">Assign</button></td>
            </tr>
        </table>
        <form>        
        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
            

        </div>    
<?php
}else{
echo "<div class = 'alert2 alert-info alert-dismissable'>
Order nolonger appears under assigned orders...
</div>";
}
?>               
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
