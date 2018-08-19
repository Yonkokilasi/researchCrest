<?php
include("connect.php");
include("session.php");
include('pagination/function.php');
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 50;
$startpoint = ($page * $limit) - $limit;

$statement = "`order` WHERE orderStatus = 'completed'";
$cr = "SELECT * FROM `order` WHERE orderStatus = 'completed' ";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<link rel="shortcut icon" href="../img/icon.png" />

<title>Completed Orders | Research Paper Web</title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, print"/>
<link rel="stylesheet" href="css/table-styler.css" type="text/css" media="screen, print"/>
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
    <div class="row" >
        <div class="col-lg-12">
            <h3 class="page-header">            
            Completed Orders
            (<?php echo $np;?>)
            <small class = "breadcrumb pull-right"><a href = "index.php">Dashboard</a> / Completed Orders / </small>
            </h3>

        <?php
            if(isset($_SESSION["msg"]))
                {
                $msg = $_SESSION["msg"];
                echo "
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            $msg
                        </div>
                ";
                unset($_SESSION["msg"]);
                }
        ?>        

        </div>
        <div id="posted_orders" style = "float:left;width:100%;">
        <table class = "table" align="center" style="width:100%; font-size: 12px;">
        <tr style="with:100%; background-color: #eeeeee; ">
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ORDER ID
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        STATUS
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        PAPER TOPIC
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        DEADLINE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        DISCIPLINE
        </td>
        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        PAGES/COST
        </td>

        <td style="border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;">
        ACTION
        </td>
        </tr>
        <?php
        $sql = "SELECT * FROM timeleft
        WHERE orderStatus = 'completed' ORDER BY orderId DESC  LIMIT {$startpoint} , {$limit};";
        $result = mysqli_query($Con, $sql);
        $chec2 = mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
           $top =  $row['paperTopic'];
           $topic = substr($top, 0, 20);
           $sub =  $row['paperSubject'];
           $paperSubject = substr($sub, 0, 20);
        ?>
        <tr>
        <td>#<?php echo $row['orderId'];?></td>
        <td style="color: #5BC431; font-weight: bolder;">Completed</td>
        <td><?php echo $topic;?></td>
        <td>

        <?php
        $deadline = $row['deadline'];
        $sql90 = "SELECT TIMEDIFF('$deadline', now()) AS DiffDate";
        $query90 = mysqli_query($Con, $sql90);
        $row90 = mysqli_fetch_array($query90);
        $datediff = $row90['DiffDate'];

        if ($datediff < 0)
        {

        echo substr($datediff, 0, 1);

        } elseif ($datediff > 0){
            echo "";
 
        } else{
           echo substr($datediff, 0, 1); 
        }      
        ?>

        
        <?php echo $row['Days'];?>d
        <?php echo $row['Hours'];?>h
        <?php echo $row['Minutes'];?>m
        </td>
        <td>
        <?php echo $paperSubject ;?><br/>
        <small><?php echo $row['level'];?></small></td>
        <td><?php echo $row['numberOfPages'];?> / &#36;<?php echo $row['total'];?></td>
        
        <td>
        <a href="viewCompleted.php?id=<?=$row["orderId"];?>"> View </a>
       
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
            echo "There are no pending orders at the moment";
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

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
<script src="js/jquery.js" type="text/javascript"></script>
<script src="scripts.js"></script>
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
    $(".alert").delay
(5000).fadeOut(20000);
</script>

</body>
</html>
