<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "localhost";
$database = "r_p_w";
$username = "Genius";
$password = "8xpdh-pckkg";
$Con = mysqli_connect($hostname, $username, $password,$database) or trigger_error(mysql_error(),E_USER_ERROR); 
/*if ($Con){
$conn = mysql_select_db($database) or trigger_error(mysql_error(),E_USER_ERROR);

}*/

?>