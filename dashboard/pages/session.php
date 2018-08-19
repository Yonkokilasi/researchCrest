<?php
    //Start session
    session_start();
    //Check whether the session variable SESS_MEMBER_ID is present or not
    if(!isset($_SESSION['user']) && !isset($_SESSION['id']) && (trim($_SESSION['id']) == '')) {

    header("Location: logout2.php");      
        exit();
    } else{
        $session_id   = $_SESSION['id'];
        $session_user = $_SESSION['user'];
    // set time-out period (in seconds)
$inactive = 600;

// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: logout2.php");
    }
}
$_SESSION["timeout"] = time();    
}
?>