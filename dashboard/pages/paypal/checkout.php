<?php
include("../connect.php");
include("../session.php");
date_default_timezone_set("GMT");

if (!isset($_GET['amount'], $_GET['paypalemail'], $_GET['rId'])) {
    $_SESSION['msg']="An error occured during processing, please try again";
    header("location:https://www.researchpaperweb.com/admin/pages/finance-requested.php#Requested");
}

// PayPal settings
$paypal_email = $_GET['paypalemail'];
$return_url = 'https://www.researchpaperweb.com/admin/pages/paypal/success.php';
$cancel_url = 'https://www.researchpaperweb.com/admin/pages/paypal/failled.php';
$notify_url = 'https://www.researchpaperweb.com/admin/pages/finance-requested.php#Requested';

$item_name = 'Pay Writer';
$item_amount = $_GET['amount'];

$_SESSION['r_code'] = $_GET['rId'];
$_SESSION['amt']    = $item_amount;

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
    $querystring = '';
    
    // Firstly Append paypal account to querystring
    $querystring .= "?business=".urlencode($paypal_email)."&";
    
    // Append amount& currency (£) to quersytring so it cannot be edited in html
    
    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
    $querystring .= "item_name=".urlencode($item_name)."&";
    $querystring .= "amount=".urlencode($item_amount)."&";
    
    //loop for posted values and append to querystring
    foreach($_POST as $key => $value){
        $value = urlencode(stripslashes($value));
        $querystring .= "$key=$value&";
    }
    
    // Append paypal return addresses
    $querystring .= "return=".urlencode(stripslashes($return_url))."&";
    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
    $querystring .= "notify_url=".urlencode($notify_url);
    
    // Append querystring with custom field
    //$querystring .= "&custom=".$code;
    
    // Redirect to paypal IPN
    header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
    exit();
} 

?>