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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO dat (iddat, adreca, tipus, observacions, login, password) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['iddat'], "int"),
                       GetSQLValueString($_POST['adreca'], "text"),
                       GetSQLValueString($_POST['tipus'], "int"),
                       GetSQLValueString($_POST['observacions'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_conn_preferits, $conn_preferits);
  $Result1 = mysql_query($insertSQL, $conn_preferits) or die(mysql_error());

  $insertGoTo = "ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conn_preferits, $conn_preferits);
$query_recTip = "SELECT * FROM tip ORDER BY tipus ASC";
$recTip = mysql_query($query_recTip, $conn_preferits) or die(mysql_error());
$row_recTip = mysql_fetch_assoc($recTip);
$totalRows_recTip = mysql_num_rows($recTip);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <div align="center"><span class="Estilo3">INTRODUIR DADES </span></div></td>
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
	 	<td><p class="italicsbold">&nbsp;</p>
			
          <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <!--<tr valign="baseline">
       <td nowrap align="right">Iddat:</td>
      <td><input type="text" name="iddat" value="" size="4"></td>
    </tr>  -->
    <tr valign="baseline">
      <td nowrap align="right">Adre&ccedil;a:</td>
      <td><input type="text" name="adreca" value="" size="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tipus:</td>
      <td><select name="tipus" id="tipus">
        <?php
do {  
?>
        <option value="<?php echo $row_recTip['idtip']?>"<?php if (!(strcmp($row_recTip['idtip'], $row_recTip['tipus']))) {echo "selected=\"selected\"";} ?>><?php echo $row_recTip['tipus']?></option>
        <?php
} while ($row_recTip = mysql_fetch_assoc($recTip));
  $rows = mysql_num_rows($recTip);
  if($rows > 0) {
      mysql_data_seek($recTip, 0);
	  $row_recTip = mysql_fetch_assoc($recTip);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Observacions:</td>
      <td><textarea name="observacions" cols="50"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Login:</td>
      <td><input type="text" name="login" size="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password:</td>
      <td><textarea name="password" cols="32"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insereix registre"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>

</td>
  </tr>
</table>
          <p>&nbsp;</p>
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

</body>
</html>
<?php
mysql_free_result($rcdTip);
?>