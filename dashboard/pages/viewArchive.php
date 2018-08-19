<?php
include("connect.php");
include("session.php");
if (isset($_GET['id'])) {
$orderId = $_GET['id'];
} else{
$orderId = NULL;    
}
$file_addr  = "archive";

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
                <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / <a href = "archive.php">Archive</a> / View Order</small>
                </h3>
				<?php
				if(mysqli_num_rows(mysqli_query($Con, "SELECT * FROM `order` WHERE orderId = '$orderId' AND orderStatus = 'paid'"))>0)
				{            
				?> 
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
        <div class="alert2 alert-info">
            <?php
                $sql        = "SELECT clientId, writerId FROM `order` WHERE orderId = '$orderId'";
                $query      = mysqli_query($Con, $sql);
                $row        = mysqli_fetch_assoc($query);
                $writerId   = $row['writerId'];
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
                                <form method="POST" action="php/messages/sendMsg-approved.php">
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
            <form method="POST" action="php/redirect.php?page=viewArchive.php&id=<?=$orderId?>">
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
Order nolonger available on archive...
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
