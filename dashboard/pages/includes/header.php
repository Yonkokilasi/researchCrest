<?php
date_default_timezone_set("GMT");
//select timezone
$cr1 = "SELECT * FROM `registration` WHERE reg_id = '$session_id'";
$tl1 = mysqli_query($Con, $cr1);
$np1 = mysqli_fetch_assoc($tl1);
$zone = $np1['zone'];
//select timezone
?><!-- Alertify -->
<link rel="stylesheet" href="../alertify/css/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/css/themes/alertify.default.css" id="toggleCSS" />
<link rel="stylesheet" href="../alertify/css/themes/main.css" id="toggleCSS" />
<style type="text/css">
    .fixedbutton {
    position: fixed;
    bottom: 35%;
    left: 0px;
    z-index:2;
    width: 36px;  
}
.header-logo{
    vertical-align: top;
    width: 250px;
    display: inline-block;
    object-fit: cover;
    padding-left: 20px;
}
.label_not {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 50%;
  vertical-align: top;
}
</style>
<!-- /Alertify -->
<?php
$coun = "SELECT * FROM `order` WHERE orderStatus = 'complete';";
$variab = mysqli_query($Con, $coun); 
$ra = mysqli_fetch_assoc($variab);
?>
<div style="float:right;width:100%;background: #dff4ff; padding: .1rem 3%;">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <img src="img/logo.png" style="max-width: 200px; max-height: auto;">
</div>
<ul class="nav navbar-top-links navbar-right">
<li>
    <a href="general_notification.php">
    <i class="fa fa-bell-o fa-fw"></i>
    <span class="gen_counter" id="gen_counter"></span>
    </a>
</li>
<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-gears fa-fw"></i> Settings <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Registration page</strong>
                                </div>

                                <?php 
                                $sql = "SELECT pay.status FROM pay WHERE pay.id =  'register'";
                                $result = mysqli_query($Con, $sql);
                                $row=mysqli_fetch_assoc($result);
                                $status = $row['status'];
                                if ($status == 'No') {
                                ?>

                                <div>Registration page is inactive, click "activate" to make it active</div>
                                <form method="POST" action="php/reg.php">
                                    <button type="submit" name="activate" class="btn btn-success">Activate</button>
                                </form>

                                <?php
                                }else if ($status == "Yes") {
                                ?>

                                <div>Registration page is active, click "Deactivate" to make it make it inactive</div>
                                <form method="POST" action="php/reg.php">
                                    <button type="submit" name="Deactivate" class="btn btn-danger">Deactivate</button>
                                </form>

                                <?php
                                }
                                ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Request payment button</strong>
                                    </span>
                                </div>

                                <div>
                                <?php 
                                $sql = "SELECT pay.status FROM pay WHERE pay.id =  '37702b12d58a007b86a4895'";
                                $result = mysqli_query($Con, $sql);
                                $row=mysqli_fetch_assoc($result);
                                $status = $row['status'];
                                if ($status == 'No') {
                                ?>

                                <div>
                                Payment button on writers page is inactive, click "Activate" to make it active
                                </div>
                                
                                <form method="POST" action="php/activate_btn.php">
                                    <button type="submit" name="activate" class="btn btn-success">Activate</button>
                                </form>

                                <?php
                                }else if ($status == "Yes") {
                                ?>

                                <div>
                                Payment buttom on writers page is active, click "Deactivate" to make it inactive
                                </div>
                                
                                <form method="POST" action="php/deactivate_btn.php">
                                    <button type="submit" name="Deactivate" class="btn btn-danger">Deactivate</button>
                                </form>

                                <?php
                                }
                                ?>
                            </div>
                                
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href = "promotional.php">
                            <div>
                                <i class="fa fa-bolt"></i>
                                <strong>Set promotional code</strong>
                            </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href = "edit_order.php">
                            <div>
                                <i class="fa fa-edit"></i>
                                <strong>Edit Order</strong>
                            </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href = "log.php">
                            <div>
                                <i class="fa fa-certificate"></i>
                                <strong>Paypal Log</strong>
                            </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-messages -->

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php
            $cr_x = "SELECT * FROM `profilepict` WHERE regId = '$session_id'";
            $tl_x = mysqli_query($Con, $cr_x);
            $np_x = mysqli_fetch_assoc($tl_x);
            $p_name = $np_x['name'];
            if (empty($p_name)) {
            ?>
            <img src="img/user/2.jpg" style="border-radius: 30px; width: 25px">
            <?php
            } elseif (!empty($p_name)) {
            ?>
            <img src="img/user/<?php echo $p_name ?>" style="border-radius: 30px; width: 25px">
            <?php
            }
            ?>
              
            <?php 
            $cou = "SELECT * FROM `registration` WHERE reg_id = '$session_id';";
            $varia = mysqli_query($Con, $cou); 
            $raws = mysqli_fetch_assoc($varia); 
            echo $raws['user_name'];?>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
</div>
<!-- Alertify -->
<script src="../alertify/js/lib/alertify.min.js"></script>
<script src="../alertify/js/lib/js.js"></script>
<!-- /Alertify -->


<div id="status2"></div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/596bbe606edc1c10b034642f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
Tawk_API = Tawk_API || {};
Tawk_API.onStatusChange = function (status){
if(status === 'online')
{
document.getElementById('status2').innerHTML = '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/online_image.png" class = "fixedbutton"> </a>';
}
else if(status === 'away')
{
document.getElementById('status2').innerHTML = '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/offline_image.png" class = "fixedbutton"> </a>';
}
else if(status === 'offline')
{
document.getElementById('status2').innerHTML = '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/offline_image.png" class = "fixedbutton"> </a>';
}
};
</script>

<!--End of tawk.to Status Code -->
