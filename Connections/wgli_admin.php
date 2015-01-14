<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_wgli_admin = "mysql.westgreatlakesaca.org";
$database_wgli_admin = "westgreatlakesaca_db";
$username_wgli_admin = "acaadmin";
$password_wgli_admin = "serenityprayer100";
$wgli_admin = mysql_pconnect($hostname_wgli_admin, $username_wgli_admin, $password_wgli_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<? extract($_GET); extract($_POST); ?>