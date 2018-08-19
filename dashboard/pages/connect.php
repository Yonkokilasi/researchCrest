<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "localhost";
$database = "r_p_w";
$username = "root";
$password = "";
$Con = mysqli_connect($hostname, $username, $password,$database) or trigger_error(mysql_error(),E_USER_ERROR); 
/*if ($Con){
$conn = mysql_select_db($database) or trigger_error(mysql_error(),E_USER_ERROR);

}*/

?>