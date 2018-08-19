<?php
include("../connect.php");
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard icon-blue fa-fw fa-2x"></i>Dashboard</a>
            </li>
            <li>
                <a href="#">
                    ORDERS
                    <span class="pull-right students-sidebar"></span>
                    <i id="second-level-order-trigger" class="fa fa-chevron-right pull-right rotate"></i>
                </a>
                <ul class="nav nav-second-level orders display-none">
                    <li>
                        <a href="posted.php">
                            <i class="fa fa-arrow-circle-right fa-fw fa-2x"></i>
                            Posted Orders
                            <span class="pull-right available-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="unpaid.php">
                            <i class="fa fa-bookmark-o fa-fw fa-2x text-danger"></i>
                            Unpaid Orders
                            <span class="pull-right unpaid-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="assigned.php">
                            <i class="fa fa-map-marker fa-fw fa-2x"></i>
                            Assigned Orders
                            <span class="pull-right assigned-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="progress.php">
                            <i class="fa fa-list-ol fa-fw fa-2x"></i>
                            Orders in Progress
                            <span class="pull-right orders-in-progress-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="disputed.php">
                            <i class="fa fa-question-circle fa-fw fa-2x"></i>
                            Disputed Orders
                            <span class="pull-right disputed-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="revision.php">
                            <i class="fa fa-info-circle fa-fw fa-2x"></i>
                            Orders on Revision
                            <span class="pull-right order-revision-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="completed.php">
                            <i class="fa fa-check-square-o fa-fw fa-2x"></i>
                            Completed Orders
                            <span class="pull-right completed-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="approved.php">
                            <i class="fa fa-check-square-o fa-fw fa-2x"></i>
                            Approved Orders
                            <span class="pull-right approved-orders-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="archive.php">
                            <i class="fa fa-flag-checkered fa-fw fa-2x"></i>
                            Archive
                            <span class="pull-right"></span>
                        </a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="bids.php">
                    <i class="fa fa-tags icon-blue fa-fw fa-2x"></i>
                    Orders on bid
                    <span class="pull-right bids-sidebar"></span>
                </a>
            </li>
            <li>
                <a href="#">

                    </i> Users
                    <i id="second-level-user-trigger" class="fa fa-chevron-right pull-right rotate"></i>
                </a>
                <ul class="nav nav-second-level users display-none">
                    <li>
                        <a href="students.php">
                            <i class="fa fa-suitcase fa-fw text-info fa-2x"></i>
                            Students
                            <span class="pull-right students-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="writers.php">
                            <i class="fa fa-edit fa-fw text-info fa-2x"></i>
                            Writers
                            <span class="pull-right writers-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="pending_writers.php">
                            <i class="fa fa-unlock fa-fw text-warning fa-2x"></i>
                            Pending Registrations
                            <span class="pull-right writers-2-sidebar"></span>
                        </a>
                    </li>
                    <li>
                        <a href="suspended.php">
                            <i class="fa fa-lock fa-fw text-danger fa-2x"></i>
                            Suspended
                            <span class="pull-right suspended-sidebar"></span>
                        </a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="feedback.php">
                    <i class="fa fa-list-alt fa-fw icon-blue fa-2x"></i> Feedback
                    <span class="pull-right"></span>
                </a>
            </li>
            <li>
                <a href="samples.php">
                    <i class="fa fa-file-pdf-o fa-fw icon-blue fa-2x"></i> Samples
                    <span class="pull-right"></span>
                </a>
            </li>
            <li>
                <a href="blog.php">
                    <i class="fa fa-desktop fa-fw icon-blue fa-2x"></i> Blog
                    <span class="pull-right"></span>
                </a>
            </li>
            <li>
                <a href="seo.php">
                    <i class="fa fa-book fa-fw icon-blue fa-2x"></i> Seo pages
                    <span class="pull-right"></span>
                </a>
            </li>
            <li>
                <a href="messages.php">
                    <i class="fa fa-comments-o icon-blue fa-fw fa-2x"></i> Messages
                    <span class="pull-right messaging-sidebar"></span>
                </a>
            </li>
            <li>
                <a href="notifications.php">
                    <i class="fa fa-bullhorn fa-fw icon-blue fa-2x"></i> Notifications
                    <span class="pull-right view-notification-sidebar"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-money fa-fw icon-blue fa-2x"></i>
                    Payments
                    <i id="second-level-finance-trigger" class="fa fa-chevron-right pull-right rotate"></i>

                </a>
                <ul class="nav nav-second-level display-none finance">
                    <li>
                        <a href="finance.php">
                            <i class="fa fa-bolt fa-fw icon-blue"></i> Financial Overview</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>