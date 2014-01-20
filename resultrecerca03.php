<?php require_once('Connections/conn_preferits.php'); ?>

<?php

if (!function_exists("GetSQLValueString")) {

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 

{

  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;



  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);



  switch ($theType) {

    case "text":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;    

    case "long":

    case "int":

      $theValue = ($theValue != "") ? intval($theValue) : "NULL";

      break;

    case "double":

      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";

      break;

    case "date":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;

    case "defined":

      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

      break;

  }

  return $theValue;

}

}



$colname_rcdRecerca = "-1";

if (isset($_GET['obser'])) {

  $colname_rcdRecerca = (get_magic_quotes_gpc()) ? $_GET['obser'] : addslashes($_GET['obser']);

}

mysql_select_db($database_conn_preferits, $conn_preferits);

$query_rcdRecerca = sprintf("SELECT dat.iddat, dat.adreca, tip.tipus, dat.observacions, dat.login, dat.password FROM dat JOIN tip WHERE dat.observacions LIKE CONCAT('%%', %s, '%%') AND dat.tipus = tip.idtip ORDER BY dat.adreca ASC", GetSQLValueString($colname_rcdRecerca, "text"));

$rcdRecerca = mysql_query($query_rcdRecerca, $conn_preferits) or die(mysql_error());

$row_rcdRecerca = mysql_fetch_assoc($rcdRecerca);

$totalRows_rcdRecerca = mysql_num_rows($rcdRecerca);



mysql_select_db($database_conn_preferits, $conn_preferits);

$query_rcdTipus = "SELECT * FROM tip";

$rcdTipus = mysql_query($query_rcdTipus, $conn_preferits) or die(mysql_error());

$row_rcdTipus = mysql_fetch_assoc($rcdTipus);

$totalRows_rcdTipus = mysql_num_rows($rcdTipus);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Zona d'Art - Preferits</title>
    <style type="text/css">
<!--
.Estilo3 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
    </style>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
<table id="main" border="0" cellpadding="0" cellspacing="0" width="70%">
    <tbody><tr>
    <td><a href="index.html" target="_self"><img src="imatges/capsal02.png" border="0" /></a></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
      <td background="assets/body_main_header.gif" class="main">&nbsp;
        <div align="center"><span class="Estilo3">RESULTAT DE LA RECERCA </span></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
	  <div align="center">
	   <img src="imatges/body_main_header.gif" /><br>
	   <table width="100%" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	   <tr>
	 	<td><p align="center" class="italicsbold">
		
		<table width="100%" border="1" align="center">

  <tr>

    <td><strong>Iddat</strong></td>

    <td><strong>Adre&ccedil;a</strong></td>

    <td><strong>Tipus</strong></td>

    <td><strong>Observacions</strong></td>

    <?php /* <td><strong>Login</strong></td>

    <td><strong>Password</strong></td> */ ?>

  </tr>

  <?php do { ?>

    <tr>

      <td><?php echo $row_rcdRecerca['iddat']; ?></td>

      <td><a href="<?php echo $row_rcdRecerca['adreca']; ?>" target="_blank"><?php echo $row_rcdRecerca['adreca']; ?></a></td>

      <td><?php echo $row_rcdRecerca['tipus']; ?></td>

      <td><?php echo $row_rcdRecerca['observacions']; ?></td>

      <?php /* <td><?php echo $row_rcdRecerca['login']; ?></td>

      <td><?php echo $row_rcdRecerca['password']; ?></td> */ ?>

    </tr>

    <?php } while ($row_rcdRecerca = mysql_fetch_assoc($rcdRecerca)); ?>

</table>
		
		</p>
			<p>&nbsp;</p></td>
		</tr>
		</table>
	   <br></div>
	 </td>
  </tr>
</tbody></table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
      <td><div align="center"><img src="imatges/body_main_footer.gif" /></div></td>
  </tr>
</tbody></table>
</div>
</body>
</html>
<?php

mysql_free_result($rcdRecerca);



mysql_free_result($rcdTipus);

?>