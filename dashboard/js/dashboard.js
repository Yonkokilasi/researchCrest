//Check for new message
$(document).ready(function () {

    $('#menuToggle').click(function (){
        $('.navbar-default').slideToggle('collapse');
    });

    $.ajaxSetup({
        cache: false
    }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
    setInterval(function () {
        var msgId = "null";
        $.ajax({
            url: "refresh_message?",
            data: msgId,
            success: function (result) {

                if (result == "0") {
                    return false;
                } else if (result == "1") {
                    alertify.log("You have unread message(s)");
                } else {
                    return false;
                }

            }
        })
    }, 6000); // the "3000" 
});


//Preload page
$(window).load(function () { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({
        'overflow': 'visible'
    });
})


//Notification
$(".alert").delay(5000).fadeOut(10000);

//Notification on Email
$(".alert_email").delay(9000).fadeOut(10000);

//Notification
// $(".alert2").delay
// (5000).fadeOut(10000);


//Set message to viewed
$(".view-message").on('shown.bs.collapse', function () {
    var msgId = this.id;
    $.ajax({
        url: "set_msg_status?msgId=" + this.id,
        data: msgId,
        success: function (result) {
            // alert("Hi, testing");
            // alert( result );
        }
    })
});


//Set message to viewed
$(".logout-user").on('click', function () {
    var msgId = this.id;
    $.ajax({
        url: "logout?",
        data: msgId,
        success: function (result) {
            // alert("Hi, testing");
            // alert( result );
        }
    })
});

$(document).ready(function () {
    $.ajax({
        url: "php/user_session.php",
        success: function (result) {
            if (result == "0") {
                return false;
            } else if (result == "1") {
                window.location = "logout.php"
            } else {
                return false;
            }

        }
    })
});

// TAB RELOAD
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});

//REFRESH WRITER DASHBOARD
//Available Orders
var resreshId = setInterval(function () {
    $('.available-orders-dash').show().load('process-dash/available.php');
}, 1000);

//Orders In Progress
var resreshId = setInterval(function () {
    $('.orders-in-progress-dash').show().load('process-dash/in-progress.php');
}, 1000);

//Completed Orders
var resreshId = setInterval(function () {
    $('.completed-orders-dash').show().load('process-dash/completed.php');
}, 1000);

//Eligible Payment
var resreshId = setInterval(function () {
    $('.finance-dash').show().load('process-dash/finance.php');
}, 1000);

//Orders on Revision
var resreshId = setInterval(function () {
    $('.order-revision-dash').show().load('process-dash/revision.php');
}, 1000);

//Disputed Orders
var resreshId = setInterval(function () {
    $('.disputed-orders-dash').show().load('process-dash/disputed.php');
}, 1000);

//Notifications
var resreshId = setInterval(function () {
    $('.view-notification-dash').show().load('process-dash/notifications.php');
}, 1000);

//Messages
var resreshId = setInterval(function () {
    $('.messaging-dash').show().load('process-dash/messaging.php');
}, 1000);


//REFRESH WRITER SIDE-BAR
//Available Orders
var resreshId = setInterval(function () {
    $('.available-orders-sidebar').show().load('process-sidebar/available.php');
}, 1000);


//My Bids
var resreshId = setInterval(function () {
    $('.bids-sidebar').show().load('process-sidebar/bids.php');
}, 1000);

//Current Orders
var resreshId = setInterval(function () {
    $('.my-current-sidebar').show().load('process-sidebar/my-current.php');
}, 1000);

// writer assigned
var resreshId = setInterval(function () {
    $('.wrtr_assigned').show().load('process-sidebar/assigned.php');
}, 1000);

// writer assigned
var resreshId = setInterval(function () {
    $('.wrtr_assigned2').show().load('process-sidebar/assigned.php');
}, 1000);

//Orders In Progress
var resreshId = setInterval(function () {
    $('.orders-in-progress-sidebar').show().load('process-sidebar/in-progress.php');
}, 1000);

//Completed Orders
var resreshId = setInterval(function () {
    $('.completed-orders-sidebar').show().load('process-sidebar/completed.php');
}, 1000);

//Orders on Revision
var resreshId = setInterval(function () {
    $('.order-revision-sidebar').show().load('process-sidebar/revision.php');
}, 1000);

//Disputed Orders
var resreshId = setInterval(function () {
    $('.disputed-orders-sidebar').show().load('process-sidebar/disputed.php');
}, 1000);

//Approved Orders
var resreshId = setInterval(function () {
    $('.approved-orders-sidebar').show().load('process-sidebar/approved-orders.php');
}, 1000);

//Archive
// var resreshId = setInterval(function()
// {
// $('.archives-sidebar').show().load('process-sidebar/archives.php');
// }, 1000
// );

//Notifications
var resreshId = setInterval(function () {
    $('.view-notification-sidebar').show().load('process-sidebar/notifications.php');
}, 1000);

//Messages
var resreshId = setInterval(function () {
    $('.messaging-sidebar').show().load('process-sidebar/messaging.php');
}, 1000);