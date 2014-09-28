<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_wgli_admin = "localhost";
$database_wgli_admin = "westgreatlakesaca_local_db";
$username_wgli_admin = "root";
$password_wgli_admin = "root";
$wgli_admin = mysql_pconnect($hostname_wgli_admin, $username_wgli_admin, $password_wgli_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<? extract($_GET); extract($_POST); ?>