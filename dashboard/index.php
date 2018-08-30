<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="../img/icon.png" />

    <title>Dashboard | Research Paper Web</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Oxygen|Quicksand|Roboto+Mono|Rubik" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='../css/bootstrap.min.css' type='text/css' />
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/widget-styles.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen, print" />

    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script> -->
    <script src="js/dashboard.js"></script>

    <!-- Custom  JavaScript -->
    <script src="js/sb-admin-2.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- /.navbar-header -->

            <?//php include('includes/header.php'); ?>
        </nav>
        <div class="container-fluid">
            <?php include('includes/sidebar.php'); ?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header">Admin Dashboard
                                <small class="breadcrumb pull-right">Dashboard / </small>
                            </h3>
                            <?php
                            if (isset($_SESSION["msg"])) {
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
                        <div class="card-group row">
                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <i class="fa fa-list-alt large-icon"></i>
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Posted
                                                Orders
                                            </div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="posted.php">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <i class="fa fa-tasks large-icon"></i>
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">
                                                Orders in Progress</div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <i class="fa fa-check-square-o large-icon"></i>
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Completed
                                                Orders
                                            </div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <i class="fa fa-dollar large-icon"></i>
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">PayPal
                                                Debits
                                            </div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Revision</div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Disputes</div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <!-- posted order value goes here -->
                                            <div class="h5 text-secondary mb-0 mt-1">200</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs small">New
                                                Notification(s)
                                            </div>
                                        </div>
                                        <div class="b-b-1 pt-3"></div>
                                        <hr>
                                        <div class="more-info pt-2">
                                            <a class="font-weight-bold font-xs btn-block text-muted small" href="#">View
                                                More
                                                <i class="fa fa-angle-right float-right font-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class=" col-6 col-lg-3 ">
                                    <div class="card ">
                                        <div class="card-body ">
                                            <div class="clearfix ">
                                                <!-- posted order value goes here -->
                                                <div class="h5 text-secondary mb-0 mt-1 ">200</div>
                                                <div class="text-muted text-uppercase font-weight-bold font-xs small ">New
                                                    Message(s)</div>
                                            </div>
                                            <div class="b-b-1 pt-3 "></div>
                                            <hr>
                                            <div class="more-info pt-2 ">
                                                <a class="font-weight-bold font-xs btn-block text-muted small " href="# ">View
                                                    More
                                                    <i class="fa fa-angle-right float-right font-lg "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script type="text/javascript ">
            //Check timezone checker
            $(document).ready(function () {
                $.ajaxSetup({
                    cache: false
                }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
                setInterval(function () {
                    var msgId = "null ";
                    $.ajax({
                            url: "php/check_zone.php? ",
                            data: msgId,
                            success: function (result) {

                                if (result == "0 ") {
                                    return false;
                                } else if (result == "1 ") {
                                    alertify.confirm(
                                        "No timezone selected. Go to settings and <strong>UPDATE your
                                        timezone < /strong>", function (e) { if (e) { / /
                                        alertify.success("You've clicked OK"); window.location
                                        .href =
                                        'settings.php';
                                    }
                                    else {
                                        alertify.error("You've clicked Cancel");
                                    }
                                });
                        }
                        else {
                            return
                            false;
                        }
                    }
                })
            }, 1000); // the "3000" }); //Check phone number $(document).ready(function
            () {
                $.ajaxSetup({
                    cache: false
                }); // This part addresses an IE bug. without it, IE will
                only load the first number and will never refresh setInterval(function () {
                            var msgId = "null";
                            $.ajax({
                                        url: "php/check_phone.php?",
                                        data: msgId,
                                        success: function (result) {
                                                if (result ==
                                                    "0") {
                                                    return false;
                                                } else if (result == "1") {
                                                    alertify.confirm("Phone number NOT set.
                                                        Go to settings and < strong > UPDATE your phone number <
                                                        /strong>", function (e) { if (e) { / /
                                                        alertify.success("You've clicked OK"); window.location.href =
                                                        'settings.php';
                                                    }
                                                    else {
                                                        alertify.error("You've
                                                                clicked Cancel "); } }); } else { return false; } } }) }, 1000); // the "
                                                                3000 " });
        </script>

</body>

</html>