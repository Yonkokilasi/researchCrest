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
            <!-- user_name -->
            <div class="modal fade" id="user_name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change use name
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/profile/username.php">
                                    <i class="fa fa-key fa-fw "></i> Current Password
                                    <input type="password" name="password" class="form-control" required="required">
                                    <i class="fa fa-user fa-fw "></i> User name
                                    <input type="text" name="writername" class="form-control" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <i class="fa fa-times fa-fw "></i>
                                    Close</button>
                                    <button type="submit" name="chngname" class="btn btn-primary">
                                    <i class="fa fa-save fa-fw "></i>
                                    Update</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
            <!-- user_name -->
            <!-- email -->
            <div class="modal fade" id="accountEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change Account Email
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/profile/email.php">
                                    <i class="fa fa-key fa-fw "></i> Current Password
                                    <input type="password" name="password" class="form-control" required="required">
                                    <i class="fa fa-envelope-o fa-fw "></i> Account Email
                                    <input type="email" name="writerEmail" class="form-control" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <i class="fa fa-times fa-fw "></i>
                                    Close</button>
                                    <button type="submit" name="cngemail" class="btn btn-primary">
                                    <i class="fa fa-save fa-fw "></i>
                                    Update</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
            <!-- email -->
            <!-- profile pic -->
            <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change Account Profile Picture
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/update-pic.php" enctype="multipart/form-data">
                                <div style="padding-right: 50px; text-align: center;">
                        <?php
                        if (empty($p_name)) {
                        ?>
                        <img src="img/user/2.jpg" style="border-radius: 100px; width: 200px">
                        <?php
                        } elseif (!empty($p_name)) {
                        ?>
                        <img src="img/user/<?php echo $p_name ?>" style="border-radius: 100px; width: 200px">
                        <?php
                        }
                        ?>
                                </div>
                                    <input type="file" name="photo" class="form-control" placeholder="select picture">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <i class="fa fa-times fa-fw "></i>
                                    Close</button>
                                    <button type="submit" id="use_default" name="use_default" class="btn btn-success">
                                    <i class="fa fa-user fa-fw "></i>
                                    Use Default Image</button>
                                    <button type="submit" id="save-image" name="save-image" class="btn btn-primary">
                                    <i class="fa fa-save fa-fw "></i>
                                    Save Image</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
            <!-- profile pic -->
            <!-- password -->
            <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change Account Password
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/profile/pass.php">
                                    <i class="fa fa-key fa-fw "></i> Current Password
                                    <input type="password" name="password" class="form-control" required="required">
                                    <i class="fa fa-lock fa-fw "></i> New Password
                                    <input type="password" name="pass2" class="form-control" required="required">
                                    <i class="fa fa-unlock-alt fa-fw "></i> Confirm New Password
                                    <input type="password" name="pass3" class="form-control" required="required">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <i class="fa fa-times fa-fw "></i>
                                    Close</button>
                                    <button type="submit" name="chngpass" class="btn btn-primary">
                                    <i class="fa fa-save fa-fw "></i>
                                    Update</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
            <!-- password -->
             <!-- time_zone -->
            <div class="modal fade" id="time_zone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel">
                                        Change Time Zone 
                                    </h5>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="php/update_time_zone.php">
                                <select name="zone_time" class="form-control">
                                <option value="-720">[UTC - 12] Baker Island Time</option>
                                <option value="-660">[UTC - 11] Niue Time, Samoa Standard Time</option>
                                <option value="-600">[UTC - 10] Hawaii-Aleutian Standard Time, Cook Island Time</option>
                                <option value="-570">[UTC - 9:30] Marquesas Islands Time</option>
                                <option value="-540">[UTC - 9] Alaska Standard Time, Gambier Island Time</option>
                                <option value="-480">[UTC - 8] Pacific Standard Time</option>
                                <option value="-420">[UTC - 7] Mountain Standard Time</option>
                                <option value="-360">[UTC - 6] Central Standard Time</option>
                                <option value="-300">[UTC - 5] Eastern Standard Time</option>
                                <option value="-270">[UTC - 4:30] Venezuelan Standard Time</option>
                                <option value="-240">[UTC - 4] Atlantic Standard Time</option>
                                <option value="-210">[UTC - 3:30] Newfoundland Standard Time</option>
                                <option value="-180">[UTC - 3] Amazon Standard Time, Central Greenland Time</option>
                                <option value="-120">[UTC - 2] Fernando de Noronha Time, South Georgia &amp; the South Sandwich Islands Time</option>
                                <option value="-60">[UTC - 1] Azores Standard Time, Cape Verde Time, Eastern Greenland Time</option>
                                <option value="0" selected="selected">[UTC] Western European Time, Greenwich Mean Time</option>
                                <option value="60">[UTC + 1] Central European Time, West African Time</option>
                                <option value="120">[UTC + 2] Eastern European Time, Central African Time</option>
                                <option value="180">[UTC + 3] Moscow Standard Time, Eastern African Time</option>
                                <option value="210">[UTC + 3:30] Iran Standard Time</option>
                                <option value="240">[UTC + 4] Gulf Standard Time, Samara Standard Time</option>
                                <option value="270">[UTC + 4:30] Afghanistan Time</option>
                                <option value="300">[UTC + 5] Pakistan Standard Time, Yekaterinburg Standard Time</option>
                                <option value="330">[UTC + 5:30] Indian Standard Time, Sri Lanka Time</option>
                                <option value="345">[UTC + 5:45] Nepal Time</option>
                                <option value="360">[UTC + 6] Bangladesh Time, Bhutan Time, Novosibirsk Standard Time</option>
                                <option value="390">[UTC + 6:30] Cocos Islands Time, Myanmar Time</option>
                                <option value="420">[UTC + 7] Indochina Time, Krasnoyarsk Standard Time</option>
                                <option value="480">[UTC + 8] Chinese Standard Time, Australian Western Standard Time, Irkutsk Standard Time</option>
                                <option value="525">[UTC + 8:45] Southeastern Western Australia Standard Time</option>
                                <option value="540">[UTC + 9] Japan Standard Time, Korea Standard Time, Chita Standard Time</option>
                                <option value="570">[UTC + 9:30] Australian Central Standard Time</option>
                                <option value="600">[UTC + 10] Australian Eastern Standard Time, Vladivostok Standard Time</option>
                                <option value="630">[UTC + 10:30] Lord Howe Standard Time</option>
                                <option value="660">[UTC + 11] Solomon Island Time, Magadan Standard Time</option>
                                <option value="690">[UTC + 11:30] Norfolk Island Time</option>
                                <option value="720">[UTC + 12] New Zealand Time, Fiji Time, Kamchatka Standard Time</option>
                                <option value="765">[UTC + 12:45] Chatham Islands Time</option>
                                <option value="780">[UTC + 13] Tonga Time, Phoenix Islands Time</option>
                                <option value="840">[UTC + 14] Line Island Time</option>
                                </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <i class="fa fa-times fa-fw "></i>
                                    Close</button>
                                    <button type="submit" name="time_zone" class="btn btn-warning">
                                    <i class="fa fa-save fa-fw "></i>
                                    Save</button>
                                </div>
                            </div>
                            </form>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div> 
            <!-- time_zone -->            
              <div class="col-lg-12">
                <h3 class="page-header">Profile Settings
                <small class = "breadcrumb pull-right"><a href="index.php">Home</a> / <a href="profile.php">Profile</a> / Settings</small>
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
                <div class="well">
                    <table>
                        <tr>
                            <td>
                                <div style="padding-right: 50px">
                        <?php
                        if (empty($p_name)) {
                        ?>
                        <img src="img/user/2.jpg" style="border-radius: 100px; width: 200px">
                        <?php
                        } elseif (!empty($p_name)) {
                        ?>
                        <img src="img/user/<?php echo $p_name ?>" style="border-radius: 100px; width: 200px">
                        <?php
                        }
                        ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                <?php
                                $sql = mysqli_fetch_assoc(mysqli_query($Con, "SELECT * FROM `registration` WHERE reg_id = '$session_id'"));
                                    $user_name   = $sql['user_name'];
                                    $email      = $sql['email'];
                                    $reg_id      = $sql['reg_id'];
                                    $zone       = $sql['zone'];
                                    ?>
                                    <p>Profile Id: <strong><?php echo $reg_id ?></strong></p>
                                    <p>User Name: <strong><?php echo $user_name ?></strong>
                                    </p>
                                    <p>Account Email:<strong><?php echo $email ?></strong>
                                    </p>
                                    <p>Time Zone:<strong><?php 
                                    if ($zone == "-720") {
                                        $name = "[UTC - 12] Baker Island Time";
                                    }elseif ($zone == "-660") {
                                        $name = "[UTC - 11] Niue Time, Samoa Standard Time";
                                    }elseif ($zone == "-600") {
                                        $name = "[UTC - 10] Hawaii-Aleutian Standard Time, Cook Island Time";
                                    }elseif ($zone == "-570") {
                                        $name = "[UTC - 9:30] Marquesas Islands Time";
                                    }elseif ($zone == "-540") {
                                        $name = "[UTC - 9] Alaska Standard Time, Gambier Island Time";
                                    }elseif ($zone == "-480") {
                                        $name = "[UTC - 8] Pacific Standard Time";
                                    }elseif ($zone == "-420") {
                                        $name = "[UTC - 7] Mountain Standard Time";
                                    }elseif ($zone == "-360") {
                                        $name = "[UTC - 6] Central Standard Time";
                                    }elseif ($zone == "-300") {
                                        $name = "[UTC - 5] Eastern Standard Time";
                                    }elseif ($zone == "-270") {
                                        $name = "[UTC - 4:30] Venezuelan Standard Time";
                                    }elseif ($zone == "-240") {
                                        $name = "[UTC - 4] Atlantic Standard Time";
                                    }elseif ($zone == "-210") {
                                        $name = "[UTC - 3:30] Newfoundland Standard Time";
                                    }elseif ($zone == "-180") {
                                        $name = "[UTC - 3] Amazon Standard Time, Central Greenland Time";
                                    }elseif ($zone == "-120") {
                                        $name = "[UTC - 2] Fernando de Noronha Time, South Georgia &amp; the South Sandwich Islands Time";
                                    }elseif ($zone == "-60") {
                                        $name = "[UTC - 1] Azores Standard Time, Cape Verde Time, Eastern Greenland Time";
                                    }elseif ($zone == "0") {
                                        $name = "[UTC] Western European Time, Greenwich Mean Time";
                                    }elseif ($zone == "60") {
                                        $name = "[UTC + 1] Central European Time, West African Time";
                                    }elseif ($zone == "120") {
                                        $name = "[UTC + 2] Eastern European Time, Central African Time";
                                    }elseif ($zone == "180") {
                                        $name = "[UTC + 3] Moscow Standard Time, Eastern African Time";
                                    }elseif ($zone == "210") {
                                        $name = "[UTC + 3:30] Iran Standard Time";
                                    }elseif ($zone == "240") {
                                        $name = "[UTC + 4] Gulf Standard Time, Samara Standard Time";
                                    }elseif ($zone == "270") {
                                        $name = "[UTC + 4:30] Afghanistan Time";
                                    }elseif ($zone == "300") {
                                        $name = "[UTC + 5] Pakistan Standard Time, Yekaterinburg Standard Time";
                                    }elseif ($zone == "330") {
                                        $name = "[UTC + 5:30] Indian Standard Time, Sri Lanka Time";
                                    }elseif ($zone == "345") {
                                        $name = "[UTC + 5:45] Nepal Time";
                                    }elseif ($zone == "360") {
                                        $name = "[UTC + 6] Bangladesh Time, Bhutan Time, Novosibirsk Standard Time";
                                    }elseif ($zone == "390") {
                                        $name = "[UTC + 6:30] Cocos Islands Time, Myanmar Time";
                                    }elseif ($zone == "420") {
                                        $name = "[UTC + 7] Indochina Time, Krasnoyarsk Standard Time";
                                    }elseif ($zone == "480") {
                                        $name = "[UTC + 8] Chinese Standard Time, Australian Western Standard Time, Irkutsk Standard Time";
                                    }elseif ($zone == "525") {
                                        $name = "[UTC + 8:45] Southeastern Western Australia Standard Time";
                                    }elseif ($zone == "540") {
                                        $name = "[UTC + 9] Japan Standard Time, Korea Standard Time, Chita Standard Time";
                                    }elseif ($zone == "570") {
                                        $name = "[UTC + 9:30] Australian Central Standard Time";
                                    }elseif ($zone == "600") {
                                        $name = "[UTC + 10] Australian Eastern Standard Time, Vladivostok Standard Time";
                                    }elseif ($zone == "630") {
                                        $name = "[UTC + 10:30] Lord Howe Standard Time";
                                    }elseif ($zone == "660") {
                                        $name = "[UTC + 11] Solomon Island Time, Magadan Standard Time";
                                    }elseif ($zone == "690") {
                                        $name = "[UTC + 11:30] Norfolk Island Time";
                                    }elseif ($zone == "720") {
                                        $name = "[UTC + 12] New Zealand Time, Fiji Time, Kamchatka Standard Time";
                                    }elseif ($zone == "765") {
                                        $name = "[UTC + 12:45] Chatham Islands Time";
                                    }elseif ($zone == "780") {
                                        $name = "[UTC + 13] Tonga Time, Phoenix Islands Time";
                                    }elseif ($zone == "840") {
                                        $name = "[UTC + 14] Line Island Time";
                                    }else{
                                        $name = "No timezone selected";
                                    }
                                     echo $name;
                                     ?></strong>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                    <div>
                    <button class="btn btn-success " data-toggle='modal' data-target='#profile'>
                    <i class="fa fa-image fa-fw"></i>Profile Pic
                    </button>

                    <button class="btn btn-info " data-toggle='modal' data-target='#accountEmail'>
                    <i class="fa fa-envelope fa-fw"></i>Email
                    </button>

                    <button class="btn btn-primary " data-toggle='modal' data-target='#user_name'>
                    <i class="fa fa-user fa-fw"></i>User name
                    </button>

                    <button class="btn btn-danger " data-toggle='modal' data-target='#password'>
                    <i class="fa fa-lock fa-fw"></i>Password
                    </button>

                    <button class="btn btn-warning " data-toggle='modal' data-target='#time_zone'>
                    <i class="fa fa-clock-o fa-fw"></i>Time Zone
                    </button>
                </div>
            </div>
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
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });

    $('#reload').click(function() {
    location.reload();
    });
    </script>

</body>

</html>
