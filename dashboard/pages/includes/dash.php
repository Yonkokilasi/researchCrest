<?php
include("connect");
//posted orders
$num = "SELECT * FROM `order` WHERE orderStatus = 'not taken' AND requestWriter = 'writerId';";
$res = mysqli_query($Con, $num);
$coun = mysqli_num_rows($res);
//pending orders
$num1 = "SELECT * FROM `order` WHERE orderStatus = 'taken' AND writerId = '$session_id';";
$res1 = mysqli_query($Con, $num1);
$coun1 = mysqli_num_rows($res1);
//completed orders
$num2 = "SELECT * FROM `order` WHERE orderStatus = 'complete' AND writerId = '$session_id';";
$res2 = mysqli_query($Con, $num2);
$coun2 = mysqli_num_rows($res2);
//Eligible Payment
$num3 = "SELECT SUM(amount) AS sum FROM `payment` WHERE eligible = 'Eligible' AND writerId = '$session_id';";
$res3 = mysqli_query($Con, $num3);
$coun3 = mysqli_fetch_assoc($res3);
$sum = $coun3['sum'];
?>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $coun;?></div>
                                    <div>Posted Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="postedOrders">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $coun1;?></div>
                                    <div>Pending Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="pendingOrders">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $coun2;?></div>
                                    <div>Completed Orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="completedOrders">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">&#36; <?php
                                     
                                     if ($sum == null) {
                                        echo "0";
                                     } else{
                                     echo $sum;
                                    }
                                     ?></div>
                                    <div>Elidgible Payments</div>
                                </div>
                            </div>
                        </div>
                        <a href="eligiblePayment">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>