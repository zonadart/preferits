<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_preferits = "localhost";
$database_conn_preferits = "preferits";
$username_conn_preferits = "zonadart";
$password_conn_preferits = "c4fa6fe9";
$conn_preferits = mysql_pconnect($hostname_conn_preferits, $username_conn_preferits, $password_conn_preferits) or trigger_error(mysql_error(),E_USER_ERROR); 
?>